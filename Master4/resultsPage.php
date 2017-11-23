<?php

    // This is the tile to be use on the <title></title> tag place at the <head></head> tag.
    $tutorialTitle = "Dentists Search Zone : find one now";
 ?>
 
<!DOCTYPE html> 
<HTML LANG="en"> 
<HEAD>

    <META CHARSET="UTF-8" /><!-- This is to use different types of Chars. -->
    <TITLE><?php $tutorialTitle; ECHO ?></TITLE> 
    <META CONTENT="IE=9" HTTP-EQUIV="X-UA-Compatible" /><!-- This will to force IE browsers to behave like IE 9 -->
    <META CONTENT="<?php echo $tutorialTitle;?>" NAME="description" />
    <META CONTENT="width=device-width, initial-scale=1.0" NAME="viewport"><!-- This for mobile and desktop devices -->
 
   <!-- <TITLE>Dentist Search Zone - Find-a-Dentist Now</TITLE>  -->

<!-- Bootstrap core CSS -->
   <LINK HREF="vendor/bootstrap/css/bootstrap.min.css" REL="stylesheet">

<!-- Custom fonts for this template -->
   <LINK HREF="vendor/font-awesome/css/font-awesome.min.css" REL="stylesheet"
         TYPE="text/css">
   <LINK HREF="vendor/simple-line-icons/css/simple-line-icons.css"
         REL="stylesheet" TYPE="text/css">
   <LINK HREF="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic"
         REL="stylesheet" TYPE="text/css">

<!-- Custom styles for this template -->
   <LINK HREF="css/landing-page.min.css" REL="stylesheet">
</HEAD>
<BODY>

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
      
      <DIV CLASS="col-md-10 col-lg-8 col-xl-7 mx-auto"> 
         <div class="col-sm-2"></div>
                <div class="col-sm-8">
                <!-- This table is where the data is display. it is filled by jQuery and Ajax, the information is drop into the body tag -->
                    <table id="resultTable" class="table table-striped table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Telephone</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div> 
      </DIV>
   </DIV>
</DIV>
</HEADER> 

<!-- Bootstrap core JavaScript -->
<SCRIPT SRC="vendor/jquery/jquery.min.js"></SCRIPT> 
<SCRIPT SRC="vendor/bootstrap/js/bootstrap.bundle.min.js"></SCRIPT> 
<SCRIPT SRC="handleGetPostCalls.js"></SCRIPT>
</BODY>
</HTML> 
