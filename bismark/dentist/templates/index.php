<?php // This is the tile to be use on the 
    $tutorialTitle= "Dentists Search Zone"; 
?> 

{% load static %}

<!DOCTYPE html>
<HTML LANG="en"> 
<HEAD>
   <META CHARSET="UTF-8" />

<!-- This is to use different types of Chars. -->
   <TITLE>
   <?PHP echo $tutorialTitle; ?></TITLE> 
   <META CONTENT="IE=9" HTTP-EQUIV="X-UA-Compatible" />

<!-- This will to force IE browsers to behave like IE 9 -->
   <META CONTENT="<?php echo $tutorialTitle;?>" NAME="description" />
   <META CONTENT="width=device-width, initial-scale=1.0" NAME="viewport">

<!-- This for mobile and desktop devices -->
<!-- <TITLE>Dentist Search Zone - Find-a-Dentist Now</TITLE>  -->
<!-- Bootstrap core CSS -->
   <LINK HREF="{% static "vendor/bootstrap/css/bootstrap.min.css" %}" REL="stylesheet">

<!-- Custom fonts for this template -->
   <LINK HREF="{% static "vendor/font-awesome/css/font-awesome.min.css" %}" REL="stylesheet"
         TYPE="text/css">
   <LINK HREF="{% static "vendor/simple-line-icons/css/simple-line-icons.css" %}"
         REL="stylesheet" TYPE="text/css">
   <LINK HREF="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic"
         REL="stylesheet" TYPE="text/css">

<!-- Custom styles for this template -->
   <LINK HREF="static/css/landing-page.min.css" REL="stylesheet">
   <LINK HREF="static/css/dropdown.css" REL="stylesheet">

</HEAD>


<!-- Navigation -->
<NAV CLASS="navbar navbar-light bg-light static-top"> 
<DIV CLASS="container"> 
   <H1><A CLASS="navbar-brand" HREF="#">DENTIST SEARCH ZONE</A></H1> 

<!--<a class="btn btn-primary" href="#">Sign In</a>-->
</DIV>
</NAV> 

<!-- Masthead -->
<HEADER CLASS="masthead text-white text-center"> 
<DIV CLASS="overlay"></DIV>
<DIV CLASS="container"> 
   <DIV CLASS="row"> 

<!-- <DIV CLASS="item active"> 

      </DIV> -->
      <DIV CLASS="col-xl-9 mx-auto"> 
         <DIV CLASS="home--carousel__item__description"> 
            <H1>In Need of a Dentist?</H1>

            <P STYLE="font-size: 24px;">No Worries! Find One Now</P> 
         </DIV>
      </DIV>

      <DIV CLASS="col-md-10 col-lg-8 col-xl-7 mx-auto"> 
         <FORM action="search/" CLASS="form-horizontal" METHOD="get" ROLE="form">
         <DIV CLASS="form-row"> 
            
            <div class="col-12 col-md-3 mb-2 mb-md-0">
                <div class="form-group">
                  <select class="form-control" id="city" name="city">
                    <option>Select City</option>
                    {% for city in cities %}
                        <option>{{ city }}</option> 
                    {% endfor %}
                  </select>
                </div>
            </div>
            <div class="col-12 col-md-3 mb-2 mb-md-0">
                <div class="form-group">
                  <!--<label for="sel1">Specialty</label>-->
                  <select class="form-control" id="specialty" name="specialty">
                   <option>Select Specialty</option>
                    {% for spec in specialty %}
                        <option>{{ spec }}</option> 
                    {% endfor %}
                  </select>
                </div>
            </div>
            <DIV CLASS="col-12 col-md-6 mb-2 mb-md-0"> 
            <div class="form-group">
    					<!--<label class="col-sm-2 control-label" for="name">Search for</label>-->
    					<div class="input-group">
    						<input id="searchWord" name="searchWord" type="text" class="form-control" placeholder="Please enter a name" />
    						<span class="input-group-btn">
    								<button type="submit" class="btn btn-primary btnSearch">
    									<span class="glyphicon glyphicon-search">Search</span>
    								</button>
    						</span>
    					</div>
    				</div>
                </DIV>
            </DIV>
         </FORM>
      </DIV>
   </DIV>
</DIV>
</HEADER> 

<BODY>

<!-- JQuery (necessary for Bootstrap's JavaScript plugins) -->
<SCRIPT SRC="static/js/jquery-1.10.2.js"></SCRIPT> 
<script src="static/js/bootstrap.min.js"></script>

<!--<div class="col-md-12">&nbsp;</div>
        <DIV CLASS="col-sm-12"> 
            <TABLE CLASS="table table-striped table-hover" ID="resultTable">
                <THEAD>
                <TH>Id</TH> 
                <TH>Name</TH> 
                <TH>Email</TH> 
                <TH>Telephone</TH> 
                </THEAD>
                <TBODY>
                </TBODY>
            </TABLE>
</div>-->

</BODY>
</HTML>
