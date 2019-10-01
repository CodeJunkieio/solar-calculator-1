<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

	//including the database file
	include_once 'datab.php';

	// PHP variables
	
	$electronics 	= 	filter_var($_POST["electronics"], FILTER_SANITIZE_STRING);	
	$watts 			= 	filter_var($_POST["watts"], FILTER_SANITIZE_STRING);
	


	//CHECKING FOR EMPTY FORMS
	if (empty($electronics)){
		die("Please enter your electronics name");
	}
	
	if (empty($watts)){
		die("Please enter electronic watts");
	}



	//Output any connection error
	if ($conn->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}


	 //prepare sql insert query to insert into the electronics table
	$query =  mysqli_query($conn,"INSERT INTO electronics (elect_type) VALUES ('$electronics')");

	if (!$query) {
		echo "Sorry, could not submit your Electronics at the moment!";
	}
	else {
		// select the current id of the electronics and enter it into the watts table.
		$elect_query =  "SELECT * FROM electronics WHERE elect_type = '$electronics' LIMIT 1";
		$result = $conn->query($elect_query);
		while ($row = $result->fetch_assoc()) {
			$electronicsId = $row['id'];
		}

		// Now insert the id of the electronics into the watts table as well as the number of watts
		$watts_query =  mysqli_query($conn,"INSERT INTO watts (electronics_id, power_consumption) VALUES ('$electronicsId', '$watts')");

		// if everything submits well, display success message
		if ($watts_query) {
			echo "Your electronics and its description has been saved successfully!! <br><br><a href='index.php'> << Back</a> | <a href='calc.ind.php'> Calculate Watts >></a>";
		}
	}	
}
