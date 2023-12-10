<?php
require('config.php');
session_start();


	if(isset($_POST["username"])){
			$username = $_POST["username"];
		}
		
	if(isset($_POST["password"])){
			$password = $_POST["password"];
		}
		
	if(isset($_POST["remember"])){
			$remember = $_POST["remember"];
		}
	
	if($remember==1){
		setcookie('uname', $username, time()+60*60, "/");	//cookies will last an hour
		setcookie('upass', $password, time()+60*60, "/");
	}
	
	
	$sql = "SELECT Password FROM userdata WHERE Username = '$username'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$count = mysqli_num_rows($result);
	$hash = $row[0];
	
	if(password_verify($password, $hash)){
		$_SESSION['user'] = $username;
		header("location: ./search/src/search.php");
	} else{
		header("location: incorrect_login.html");
	}
	
?>


