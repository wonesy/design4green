
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
                    data: {name: $('input#searchWord').val()},
                    /*
                        A Javascript Object with the information. We can also do it like a query string like this:

                        'searchWord='+$('input#searchWord').val()
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