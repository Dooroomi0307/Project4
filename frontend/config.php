<?php
	//NOTE: left this empty so it can be edited to fit everyone's own db, host, username, & password names. 
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

