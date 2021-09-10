<?php
	// include config file
	require_once 'config.php';

	//a PHP Super Global variable which used to collect data after submitting it from the form
	$request = $_REQUEST;
	//employee ID we are using it to get the employee record
	$id = $request['id'];
	//get the email address value
	$email = $request['email'];
	//get the first name value
	$first_name = $request['first_name'];
	//get the last name value
	$last_name = $request['last_name'];
	//get the address value
	$address = $request['address'];

	// Set the UPDATE SQL data
	$sql = "UPDATE employees SET email='".$email."', first_name='".$first_name."', last_name='".$last_name."', address='".$address."' WHERE id='".$id."'";

	// Process the query
	if ($db->query($sql)) {
	  echo "Employee has been updated.";
	} else {
	  echo "Error: " . $sql . "<br>" . $db->error;
	}

	// Close the connection after using it
	$db->close();
?>