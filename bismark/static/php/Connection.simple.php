<?php

function dbConnect (){
 	$conn =	null; 
 	$host = 'localhost'; 
 						 
 	$db = 	'epita'; 
 	$user = 'root'; 
 	$pwd = 	''; 
	try {
		
	   	$conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
		//echo 'Connected succesfully.<br>';
	}
	catch (PDOException $e) { // PDOException object in case of failure.
		echo '<p>Cannot connect to database !!</p>';
		//echo '<p>'.$e.'</p>'; 
	    exit; // Tell PHP to execute code no more.
	}
	return $conn; // PDO object with its function and properties.
 }

 ?>