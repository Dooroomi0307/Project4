<?php

$dbServername = "localhost";
$dbUsername = "gsu username";
$dbPassword = "gsu username";
$dbName = "gsu username";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error){
    die("connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE properties (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    type varchar(20) NOT NULL,
    name varchar(50) NOT NULL,
    price int(11) NOT NULL,
    bed int(11) NOT NULL,
    bath int(11) NOT NULL,
    city varchar(20) NOT NULL,
    img varchar(20) NOT NULL
  )";

if ($conn->query($sql) === TRUE){
    echo "Table properties created succesfully";
}else{
    echo "Error";
}
$conn->close();
?>