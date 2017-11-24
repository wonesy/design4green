<!DOCTYPE html>

{% load static %}
<HTML LANG="en"> 
<HEAD>
   <META CHARSET="UTF-8" />

   <TITLE>Denstist Search Zone :: Search Results Page</TITLE> 
   <META CONTENT="IE=9" HTTP-EQUIV="X-UA-Compatible" />

   <META CONTENT="width=device-width, initial-scale=1.0" NAME="viewport">

   <LINK HREF="{% static "vendor/simple-line-icons/css/simple-line-icons.css" %}" 
         REL="stylesheet" TYPE="text/css">

<!-- Custom styles for this template -->
   <LINK HREF="{% static "css/landing-page.css" %}" REL="stylesheet">
   <LINK HREF="{% static "css/dropdown.css" %}" REL="stylesheet">

</HEAD>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Optional Theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!--DATABASE CONNECTION STARTS HERE>-->

<!-- Masthead -->
<HEADER CLASS="masthead text-white text-center"> 
<DIV CLASS="overlay"></DIV>
<DIV CLASS="container"> 
   <DIV CLASS="row"> 

          <DIV CLASS="col-xl-9 mx-auto"> 
                 <DIV CLASS="home--carousel__item__description"> 
                    <H1>Your search result(s)</H1>
                 </DIV>
          </DIV>

            <DIV CLASS="col-md-12 row"> 
                 <FORM action="search" METHOD="get">
                    <!--<DIV CLASS="form-row">-->  
                         <DIV class="col-md-3"> 
                            <div class="form-group">
                               <select class="form-control col-md-12" id="city" name="city">
                                   <option>Select City</option>
                                    {% for city in cities %}
                                        <option>{{ city }}</option>
                                    {% endfor %}
                              </select>
                            </div>
                        </DIV>
                         <DIV class="col-md-3 "> 
                            <div class="form-group">
                                <select class="form-control " id="specialty" name="specialty">
                                    <option>Select Specialty</option>
                                    {% for spec in specialty %}
                                        <option>{{ spec }}</option> 
                                    {% endfor %}
                              </select>
                            </div>
                        </DIV>
                        <DIV class="col-md-6 col-lg-6 col-sm-6"> 
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="searchWord" name="searchWord" type="text" class="form-control" placeholder="Please enter your search word" />
                                    <span class="input-group-btn">
                                            <button type="submit" class="btn btn-primary btnSearch">
                                                <span class="glyphicon glyphicon-search">&nbsp;Search</span>
                                            </button>
                                    </span>
                                </div>
                            </div>
                        </DIV>
                        
                    <!--</DIV>-->
                 </FORM>
            </DIV>
        </DIV>
    </DIV>
</HEADER> 


<!--
 CAMERON START LOOP
-->

{% for res in result %}
    <div class='panel-horizontal'>
        <div class='col-md-6'>
            <div class='panel panel-primary'>
                <div class='panel-heading'><h1 class='panel-title'>{{ res.first_name}} {{ res.last_name }}</h1></div>
                    <div class='panel-body'>
                    
                        <!--NOW WE DISPLAY THE RECORDS HERE IN THE PANEL-BODY-->
                        <div class='col-md-2'>
                            <img style="width: 100%; height: 100%; border-radius: 5px;" src="{{ res.image_hash }}"/>
                        </div>
                            
                        <div class="col-md-10">
                            <dl class='dl-horizontal'>
                                <dt>Full Name</dt>
                                <dd>{{ res.first_name }} {{ res.last_name }}</dd>
                                        
                                <dt>City</dt>
                                <dd>{{ res.city }}</dd>
                                        
                                <dt>Address</dt>
                                <dd>{{ res.address }}</dd>
                                        
                                <dt>Hours</dt>
                                <dd style="margin-left:0" id="hour_table{{ forloop.counter }}"></dd>
<script>
$(document).ready(function(){
    var raw = "{{ res.hours }}";
    try {
        var data = JSON.parse(raw.replace(/&quot;/g,'"'));
        var mon = data[0]['mon']['open'] + " to " + data[0]['mon']['close'];
        var tue = data[0]['tue']['open'] + " to " + data[0]['tue']['close'];
        var wed = data[0]['wed']['open'] + " to " + data[0]['wed']['close'];
        var thu = data[0]['thu']['open'] + " to " + data[0]['thu']['close'];
        var fri = data[0]['fri']['open'] + " to " + data[0]['fri']['close'];
    } catch (e) {
        var mon = "Unknown";
        var tue = "Unknown";
        var wed = "Unknown";
        var thu = "Unknown";
        var fri = "Unknown";
    }

    var hourstable = document.getElementById("hour_table{{ forloop.counter }}");

    hourstable.innerHTML = '<dd><strong>Mon:</strong> ' + mon + '</dd>';
    hourstable.innerHTML += '<dd><strong>Tue:</strong> ' + tue + '</dd>'; 
    hourstable.innerHTML += '<dd><strong>Wed:</strong> ' + wed + '</dd>'; 
    hourstable.innerHTML += '<dd><strong>Thu:</strong> ' + thu + '</dd>'; 
    hourstable.innerHTML += '<dd><strong>Fri:</strong> ' + fri + '</dd>'; 
});
</script>
                                        
                                <dt>Telephone</dt>
                                <dd>{{ res.phone }}</dd>
                                
                                <dt>Email</dt>
                                <dd>{{ res.email }}</dd>
                                
                                <dt>Specialty</dt>
                                <dd>{{ res.specialty }}</dd>
                                        
                            </dl>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
{% endfor %}                                        


</HTML>
