<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../style/login.css" type="text/css" rel="stylesheet" />
<title>Login</title>
</head>
<body>
	<?php include './nav.php'?>

  <div class="container">
	<h1>Login Here</h1>
	
	<div class="imgcontainer">
		<img src="./resources/person.png" alt="user" class="user">
	</div>
	
	<form action="process_login.php" method="post">
		<div class="inputgroup">
			<h4>Incorrect username or password</h4>
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required><br>
			<label for="username">Password:</label>
			<input type="text" id="password" name="password" required><br>
		
		</div>
		
		<input type="checkbox" name="remember" value="1">
		<label for="remember">Remember me</label><br>
		<input type="submit" value="Submit">
		</form>
    <p>New user? <a href="registerBuy.php">Register here</a></p>
  </div>

</body>
</html>
