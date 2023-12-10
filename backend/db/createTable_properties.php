<?php
//REMEMBER: USE YOUR OWN LOGIN WHEN UPLOADING TO SERVER
require("config.php");
// Create table
$createTable = "CREATE TABLE IF NOT EXISTS properties (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    type varchar(20) NOT NULL,
    name varchar(50) NOT NULL,
    price int(11) NOT NULL,
    bed int(11) NOT NULL,
    bath int(11) NOT NULL,
    city varchar(20) NOT NULL,
    img varchar(20) NOT NULL)";
	
if ($conn->query($createTable) === TRUE) {
    echo "Table created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Close connection
$conn->close();

?>

