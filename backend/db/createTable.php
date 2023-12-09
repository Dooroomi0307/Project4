<?php
//REMEMBER: USE YOUR OWN LOGIN WHEN UPLOADING TO SERVER
$host = "localhost"; 
$username = ""; // 
$password = ""; 
$dbname = "";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if($conn->connect_error) {
	echo "Could not connect to server\n";
	die("Connection failed: " . $conn->connect_error);
}
// Create table
$createTable = "CREATE TABLE IF NOT EXISTS userdata (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255) NOT NULL,
    Street VARCHAR(255) NOT NULL,
    City VARCHAR(255) NOT NULL,
    State VARCHAR(255) NOT NULL,
    Zip VARCHAR(10) NOT NULL,
    Phone VARCHAR(12) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Username VARCHAR(255) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    Recommend VARCHAR(255) NOT NULL)";
	
if ($conn->query($createTableQuery) === TRUE) {
    echo "Table created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Close connection
$conn->close();

?>
