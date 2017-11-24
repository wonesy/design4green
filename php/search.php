<?php

	require_once 'Connection.simple.php'; // We have to include this in order to use the dbConnect() function.
	$conn = dbConnect();
	$OK = true; // We use this to verify the status of the update.
	if (isset($_GET['name'])) { // Only execute the search if the name variable is define.
		// Create the query
		$data = "%".$_GET['name']."%";
		$sql = 'SELECT * FROM employee WHERE name like ?';
		// we have to tell the PDO that we are going to send values to the query,
		// this is the best way to prevent Database injection.
		$stmt = $conn->prepare($sql);
		// Now we execute the query passing an array toe execute();
		$results = $stmt->execute(array($data));
		// Extract the values from $result
		$rows = $stmt->fetchAll();
		$error = $stmt->errorInfo(); // If an error occur this will have information as an array
		//echo $error[2]; // If we need the error detail you can it with this.
	}
	// If there are no records.
	if(empty($rows)) {
		echo "<tr>";
			echo "<td colspan='4'>Oops! No records found matching your search word.</td>";
		echo "</tr>";
	}
	else {
		// Let us print the database results
		foreach ($rows as $row) {
			echo "<tr>";
				echo "<td>".$row['employee_id']."</td>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['email']."</td>";
				echo "<td>".$row['telephone']."</td>";
                echo "<td><a href='#'>".'Details'."</a></td>";
			echo "</tr>";
		}
	}
?>