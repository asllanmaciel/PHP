<?php
	// Include functions file
	require_once 'functions.php';

	//set the servername
	$servername = "localhost";
	//set the server username
	$username = "root";
	// set the server password (you must put password here if your using live server)
	$password = "";
	// set the table name
	$dbname = "test"; 

	$db = new mysqli($servername, $username, $password, $dbname);

	if ($db->connect_errno) {
	  echo "Failed to connect to MySQL: " . $db->connect_error;
	  exit();
	}

?>