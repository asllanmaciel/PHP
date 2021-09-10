<?php
	// include config file
	require_once 'config.php';

	//a PHP Super Global variable which used to collect data after submitting it from the form
	$request = $_REQUEST;
	//define the employee ID
	$employeeId = $request['employee_id'];

	// Set the INSERT SQL data
	$sql = "SELECT * FROM employees WHERE id='".$employeeId."'";

	// Process the query
	$results = $db->query($sql);

	// Fetch Associative array
	$row = $results->fetch_assoc();

	// Free result set
	$results->free_result();

	// Close the connection after using it
	$db->close();

	// Encode array into json format
	echo json_encode($row);
?>