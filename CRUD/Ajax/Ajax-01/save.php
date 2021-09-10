<?php
	// include config file
	require_once 'config.php';

	//a PHP Super Global variable which used to collect data after submitting it from the form
	$request = $_REQUEST;
	//get email address value
	$email = $request['email']; 
	//get first name value
	$first_name = $request['first_name'];
	//get last name value 
	$last_name = $request['last_name'];
	//get address value
	$address = $request['address'];

	// Defined $result as array
	$result = [];

	// Check if no errors
	if(isEmail($email)):
		// SQL Statement
		$sql = "INSERT INTO employees (email, first_name, last_name, address)
		VALUES ('".$email."', '".$first_name."', '".$last_name."', '".$address."')";

		// Process the query
		if ($db->query($sql)) {
		  $result['response'] = "Employee has been created.";
		} else {
		  $result['response'] = "Error: " . $sql . "<br>" . $db->error;
		}

		// Close the connection after using it
		$db->close();

	else://display errors
		$result['has_error'] = 1;
		$result['response'] = "Email address is invalid.";
	endif;

	// Encode array into json format
	echo json_encode($result);


?>