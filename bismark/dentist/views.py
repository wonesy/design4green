from models import *
from django.core.cache import cache

# Create your views here.
from django.http import HttpResponse
from django.template import loader
from django.shortcuts import render

def index(request):
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
        print "Could not find specialies"

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
    last_name  = request.GET['lastname']
    first_name = request.GET['firstname']

    objs = Dentists.objects.filter(last_name__contains=last_name, first_name__contains=first_name)
    for o in objs:
        print o.email
        print o.last_name
        print o.first_name
        print o.city
        print o.specialty
    return HttpResponse(o.email  + o.last_name + o.first_name + o.city + o.specialty)

def results(request):
    pass
