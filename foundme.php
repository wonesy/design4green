<!DOCTYPE html>
<HTML LANG="en"> 
<HEAD>
   <META CHARSET="UTF-8" />

<!-- This is to use different types of Chars. -->
   <TITLE>Denstist Search Zone :: Search Results Page</TITLE> 
   <META CONTENT="IE=9" HTTP-EQUIV="X-UA-Compatible" />

<!-- This will to force IE browsers to behave like IE 9 -->
   <META CONTENT="width=device-width, initial-scale=1.0" NAME="viewport">

<!-- This for mobile and desktop devices -->
<!-- <TITLE>Dentist Search Zone - Find-a-Dentist Now</TITLE>  -->
<!-- Bootstrap core CSS -->
   <!--<LINK HREF="vendor/bootstrap/css/bootstrap.min.css" REL="stylesheet">

<!-- Custom fonts for this template -->
   <!--<LINK HREF="vendor/font-awesome/css/font-awesome.min.css" REL="stylesheet"
         TYPE="text/css">
   <LINK HREF="vendor/simple-line-icons/css/simple-line-icons.css" 
         REL="stylesheet" TYPE="text/css">
   <!--<LINK HREF="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic"
         REL="stylesheet" TYPE="text/css">

<!-- Custom styles for this template -->
   <LINK HREF="css/landing-page.css" REL="stylesheet">
   <LINK HREF="css/dropdown.css" REL="stylesheet">

</HEAD>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Optional Theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<!-- Navigation -->
<NAV CLASS="navbar navbar-light bg-light static-top"> 
    <DIV CLASS="container"> 
       <H1><A CLASS="navbar-brand" HREF="index.php">DENTIST SEARCH ZONE</A></H1> 
    </DIV>
</NAV> 

<!--DATABASE CONNECTION STARTS HERE>-->

<!-- Masthead -->
<HEADER CLASS="masthead text-white text-center"> 
<DIV CLASS="overlay"></DIV>
<DIV CLASS="container"> 
   <DIV CLASS="row"> 

          <DIV CLASS="col-xl-9 mx-auto"> 
                 <DIV CLASS="home--carousel__item__description"> 
                    <H1>Your search result(s)</H1>
                    <P STYLE="font-size: 24px;">Total Saerch result</P> 
                 </DIV>
          </DIV>

            <DIV CLASS="col-md-12 row"> 
                 <FORM action="foundme.php" METHOD="POST">
                    <!--<DIV CLASS="form-row">-->  
                         <DIV class="col-md-3"> 
                            <div class="form-group">
                               <select class="form-control col-md-12" id="city1" name="city">
                                   <option>Select City</option>
                                        <option>1</option> 
                              </select>
                            </div>
                        </DIV>
                         <DIV class="col-md-3 "> 
                            <div class="form-group">
                                <select class="form-control " id="speciality1" name="speciality">
                               <option>Select Specialty</option>
                                    <option>1</option> 
                              </select>
                            </div>
                        </DIV>
                        <DIV class="col-md-6 col-lg-6 col-sm-6"> 
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="searchWord" name="searchWord" type="text" class="form-control" placeholder="Please enter your search word" />
                                    <span class="input-group-btn">
                                            <button type="button" class="btn btn-primary btnSearch">
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


<?php

$mysqli = new mysqli("localhost", "root", "", "epita");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

$search ="";
if (isset($_POST['txtSearch'])) {
    $search = $_POST['txtSearch'];
}

//echo $search;

// Attempt select query execution
$sql = "SELECT name, email, telephone, city, postcode, hospital, yearsofexp, photo  FROM employee WHERE name LIKE '%".$search."%'";

if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
            echo "<div>&nbsp;</div>";
        while($row = $result->fetch_array()){
            
            echo "<div class='panel-horizontal'>";
                echo "<div class='col-md-6'>";
                    echo "<div class='panel panel-primary'>";
                        echo "<div class='panel-heading'><h1 class='panel-title'>".$row['name']."</h1></div>";
                            echo "<div class='panel-body'>";
                    
                            /*NOW WE DISPLAY THE RECORDS HERE IN THE PANEL-BODY*/
                            echo "<div class='col-md-2'>";
                                echo '<img style="width: 130px; height: 170px; border-radius: 5px;" src="data:image/jpeg;base64,'.base64_encode($row['photo']).'"/>';
                            echo "</div>";
                            
                                echo "<div class='col-md-10'>";
                                    echo "<dl class='dl-horizontal'>";
                                        echo "<dt>".'Full Name'."</dt>";
                                        echo "<dd>". $row['name']."</dd>";
                                        
                                        echo "<dt>".'City'."</dt>";
                                        echo "<dd>". $row['city']."</dd>";
                                        
                                        echo "<dt>".'Post Code'."</dt>";
                                        echo "<dd>". $row['postcode']."</dd>";
                                        
                                        echo "<dt>".'Hospital'."</dt>";
                                        echo "<dd>". $row['hospital']."</dd>";
                                        
                                        echo "<dt>".'Telephone'."</dt>";
                                        echo "<dd>". $row['telephone']."</dd>";
                                        
                                        echo "<dt>".'E-mail'."</dt>";
                                        echo "<dd><a href='mailto:'".$row['email']." target='_blank'>". $row['email'] . "</a></dd>";
                                        
                                        echo "<dt>".'Speciality'."</dt>";
                                        echo "<dd>". $row['yearsofexp']."</dd>";
                                        
                                    echo "</dl>";
                                echo "</div>";

                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                
        }   // Free result set
        $result->free();
    } else{
        echo "No records matching your query were found.";
    }
} /*else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;*/
    
/*
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        echo "<table class='table table-strip'>";
            echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>E-mail</th>";
                echo "<th>Telephone</th>";
                echo "<th>City</th>";
                echo "<th>Post Code</th>";
                echo "<th>Hospital Name</th>";
                echo "<th>Yrs Of Exp.</th>";
                echo "<th>Photograph</th>";
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td><a href='mailto:'".$row['email']." target='_blank'>". $row['email'] . "</a></td>";
                echo "<td>" . $row['telephone'] . "</td>";
                echo "<td>" . $row['city'] . "</td>";
                echo "<td>" . $row['postcode'] . "</td>";
                echo "<td>" . $row['hospital'] . "</td>";
                echo "<td>" . $row['yearsofexp'] . "</td>";
                echo "<td>".'<img style="width: 35px; height: 45px;" src="data:image/jpeg;base64,'.base64_encode($row['photo']).'"/>'. "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        $result->free();
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 */
 
// Close connection
$mysqli->close();

?>

<!-- JQuery (necessary for Bootstrap's JavaScript plugins) 
<SCRIPT SRC="js/jquery-1.10.2.js"></SCRIPT> 
<script src="js/bootstrap.min.js"></script>-->

</HTML>