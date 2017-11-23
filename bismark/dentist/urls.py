from django.conf.urls import url

from . import views

urlpatterns = [
	url(r'^search/', views.search, name='search'),
	url(r'^index/', views.index, name='index'),
        #url(r'^', views.index, name='main'),
]
