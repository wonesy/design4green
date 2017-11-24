from models import *
from django.core.cache import cache
import bcrypt
import django.core.exceptions
from django.db.models import Q
import json

# Create your views here.
from django.http import HttpResponse
from django.template import loader
from django.shortcuts import render

def fetchCache():
    try:
        data = cache.get('dentists')
    except cache.InvalidCacheBackendError:
        print "Cache doesn't exist, caching now"

    if data == None:
        data = Dentists.objects.all()
        cache.set('dentists', data)

    try:
        specialties = cache.get('specialties')
    except cache.invalidCachebackendError:
        print "Could not find specialties"

    if specialties == None:
        specialties = [val['specialty'].strip('\r') for val in data.values('specialty').distinct().order_by('specialty')]
        specialties.remove('')
        cache.set('specialties', specialties)

    try:
        cities = cache.get('cities')
    except cache.invalidCachebackendError:
        print "Could not find cities"

    if cities == None:
        cities = [val['city'] for val in data.values('city').distinct().order_by('city')]
        cache.set('cities', cities)

    return data

def index(request):

    data = fetchCache()

    s = cache.get('specialties')
    c = cache.get('cities')

    context = {
        'specialty': s,
        'cities': c
    }

    return render(request, 'index.php', context)

def search(request):
    # Search database for parameters in the request
    # return results in the response
    specialty = request.GET['specialty']
    city = request.GET['city']
    name = request.GET['searchWord']
    
    if specialty == 'Select Specialty':
        specialty = ''
    
    if city == 'Select City':
        city = ''
    
    data = fetchCache()
    s = cache.get('specialties')
    c = cache.get('cities')

    tmp = data.filter(city__contains=city, specialty__contains=specialty)
    if tmp != None:
        results = tmp.filter(Q(last_name__contains=name) | Q(first_name__contains=name))
    else:
        results = data.filter(Q(last_name__contains=name) | Q(first_name__contains=name))

    context = {
        'result': results,
        'specialty': s,
        'cities': c
    }
   
    return render(request, 'foundme.php', context)

def createAccount(request):
    email = request.GET['email'].encode('utf-8')
    password = request.GET['password'].encode('utf-8')
    try:
        user = Users.objects.get(email__exact=email)
        print 'cannot create user, user already exists'
        return HttpResponse('Here is the response')
    except Users.DoesNotExist:
        print 'Does not exist'

    hashed = bcrypt.hashpw(password, bcrypt.gensalt())
    new_user = Users(email=email, password=hashed)
    new_user.save()
    return HttpResponse('success')

def authenticate(request):
    email = request.GET['email'].encode('utf-8')
    password = request.GET['password'].encode('utf-8')
 
    try:
        user = Users.objects.get(email__exact=email)
    except Users.DoesNotExist:
        print 'Does not exist'
        return HttpResponse('Here is the response')

    if bcrypt.hashpw(password, user.password.encode('utf-8')) == user.password.encode('utf-8'):
        print 'success'
        request.session['user'] = user.email
    else:
        print 'failure'
   
    return HttpResponse('Authentication complete')
