

# Create your views here.
from django.http import HttpResponse

def index(request):
    return HttpResponse("Hello, world. You're at the polls index.")

def search(request):
    # Search database for parameters in the request
    # return results in the response
    pass

def results(request):
    pass
