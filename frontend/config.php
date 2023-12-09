<?php

	$host = "";
	$database = "";
	$username = "";
	$password = "";
	$conn = new mysqli($host, $username, $password, $database);
	// Check connection
	if (!$conn) {
		echo "Failed to connect to database: " . $conn -> connect_error;
		exit();
	}
?>

