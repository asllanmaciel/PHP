<?php
	// include config file
	require_once 'config.php';

	//a PHP Super Global variable which used to collect data after submitting it from the form
	$request = $_REQUEST;
	//employee ID we are using it to get the employee record
	$id = $request['employee_id'];

	// Set the DELETE SQL data
	$sql = "DELETE FROM employees WHERE id='".$id."'";

	// Process the query so that we will save the date of birth
	if ($db->query($sql)) {
	  echo "Employee has been deleted.";
	} else {
	  echo "Error: " . $sql . "<br>" . $db->error;
	}

	// Close the connection after using it
	$db->close();
?>