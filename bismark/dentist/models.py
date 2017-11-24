from __future__ import unicode_literals

import uuid
from django.db import models

class Dentists(models.Model):
    first_name = models.CharField(max_length=100)
    last_name = models.CharField(max_length=100)
    email = models.CharField(max_length=100)
    gender = models.CharField(max_length=6)
    address = models.CharField(max_length=128)
    city = models.CharField(max_length=100)
    phone = models.CharField(max_length=16)
    image_hash = models.CharField(max_length=2000)
    hours = models.CharField(max_length=256)
    specialty = models.CharField(max_length=100)

class Users(models.Model):
    email = models.CharField(max_length=100)
    password = models.CharField(max_length=128)

class KnownDentists(models.Model):
    user = models.ForeignKey('Users', on_delete=models.PROTECT)
    dentist = models.ForeignKey('Dentists', on_delete=models.PROTECT)
