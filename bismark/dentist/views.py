from models import *

# Create your views here.
from django.http import HttpResponse
from django.template import loader
from django.shortcuts import render

def index(request):
    template = loader.get_template('index.php')
    return render(request, 'index.php')

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
