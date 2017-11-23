<?php

    // This is the tile to be use on the <title></title> tag place at the <head></head> tag.
    $tutorialTitle = "Dentists Search Zone";
 ?>
 <!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="UTF-8" /> <!-- This is to use different types of Chars. -->
        <title><?php echo $tutorialTitle;?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=9" /> <!-- This will to force IE browsers to behave like IE 9 -->		
		<meta name="description" content="<?php echo $tutorialTitle;?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- This for mobile and desktop devices -->
		<!-- Bootstrap core CSS -->
   <LINK HREF="vendor/bootstrap/css/bootstrap.min.css" REL="stylesheet">

<!-- Custom fonts for this template -->
   <LINK HREF="vendor/font-awesome/css/font-awesome.min.css" REL="stylesheet" TYPE="text/css">
   <LINK HREF="vendor/simple-line-icons/css/simple-line-icons.css" REL="stylesheet" TYPE="text/css">
   <LINK HREF="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" REL="stylesheet" TYPE="text/css">

<!-- Custom styles for this template -->
   <LINK HREF="css/landing-page.min.css" REL="stylesheet">
	</head>
    <body>
    	<div class="wrapper">
    		<div class="page-header ">
    			<h1 class="orangeFont noMargin">DENTISTS SEARCH ZONE <small>Created Master 4</small></h1>
    			<div class="panel panel-default">
				 	<div class="panel-body">
				    	<h3 class="blueFont"><?php echo $tutorialTitle;?></h3>
					</div>
				</div>
    		</div>

    		<div class="mainContent">
    			<form class="form-horizontal" role="form" method="get">
    				<div class="form-group">
    					<label class="col-sm-2 control-label" for="name">Search for</label>
    					<div class="input-group col-sm-9">
    						<input id="name" name="name" type="text" class="form-control" placeholder="Type the search word" />
    						<span class="input-group-btn">
    								<button type="button" class="btn btn-default btnSearch">
    									<span class="glyphicon glyphicon-search"> Search </span>
    								</button>
    						</span>
    					</div>
    				</div>
    			</form>
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
    		</div>
		</div>
        
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.10.2.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
        // Let us make sure that the code is working after the hole site is loaded.
    	jQuery(document).ready(function($) {
            // Let us trigger the search if the user clicks on the search button.
    		$('.btnSearch').click(function(){// Call back function.
    			makeAjaxRequest();// Since this code will be repeated in different place I have place it as a function
    		});
            // Let us trigger the search if the user submit the form by an enter.
            $('form').submit(function(e){
                e.preventDefault(); // This will prevent the submit event to bubble and therefore not firing the event.
                makeAjaxRequest();// Since this code will be repeated in different place I have place it as a function
                return false; // This will tell the function to do nothing.
            });
            /**
             * This function will make the Ajax request using the jQuery $.ajax() function
             * see: http://api.jquery.com/jQuery.ajax/
             * @return void
             */
            function makeAjaxRequest() {
                $.ajax({
                    url: 'php/search.php', // This is the file where all the stuff with the database will happen.
                    data: {name: $('input#name').val()},
                    /*
                        A Javascript Object with the information. You can also do it like a query string like this:

                        'name='+$('input#name').val()
                    */
                    type: 'get', // The type of method to be submitted.
                    success: function(response) { // Call back function that will execute if the Ajax call was succesful.
                        // Let us fill the table by targetting with the selector 'table#resultTable tbody' and filling it
                        // with the $.html() function. response is the result from the server.
                        $('table#resultTable tbody').html(response);
                    }
                });
            }
    	});
    </script>
	</body>
</html>