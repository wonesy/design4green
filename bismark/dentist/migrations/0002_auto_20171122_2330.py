# -*- coding: utf-8 -*-
# Generated by Django 1.10.7 on 2017-11-22 23:30
from __future__ import unicode_literals

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('dentist', '0001_initial'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='dentists',
            name='d_id',
        ),
        migrations.RemoveField(
            model_name='knowndentists',
            name='kd_id',
        ),
        migrations.RemoveField(
            model_name='users',
            name='u_id',
        ),
    ]
