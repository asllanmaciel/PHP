<?php
	// include config file
	require_once 'config.php';

	// SQL Statement
	$sql = "SELECT * FROM employees";

	// Process the query
	$results = $db->query($sql);

	// Fetch Associative array
	$row = $results->fetch_all(MYSQLI_ASSOC);

	// Free result set
	$results->free_result();

	// Close the connection after using it
	$db->close();

	// Encode array into json format
	echo json_encode($row);
?>