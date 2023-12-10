<!--Realtor Registration HTML File, allowing new buyers to register. -->
<?php
	//Connect to the database
	require('config.php');
	
	$errors = false;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//Validate the first and last name
    $firstName = trim($_POST["fName"]);
    $lastName = trim($_POST["lName"]);
    if (empty($firstName) || empty($lastName)) {
        $nameError = "Please enter a full name.";
    }
	//Validate the Address
    $street = trim($_POST["addStreet"]);
    $city = trim($_POST["addCity"]);
    $state = trim($_POST["addState"]);
    $zipCode = trim($_POST["addZip"]);
    if (empty($street) || empty($city) || empty($state) || empty($zipCode)) {
        $addressError = "Please enter your complete address.";
    }
	//Validate the Email
	$email = trim($_POST["email"]);
	$emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
	if (!preg_match($emailPattern, $email)) {
		$emailError = "Please enter a valid email address.";
	}
	//Validate the Phone Number
    $phoneNum = trim($_POST["phoneNum"]);
    if (!preg_match("/^\d{3}-\d{3}-\d{4}$/", $phoneNum)) {
        $phoneError = "Please enter with the required format xxx-xxx-xxxx.   ";
    }
	//Validate the new Login Register
    $userID = trim($_POST["username"]);
    $passWord = trim($_POST["password"]);
    if (empty($userID)) {
        $usernameError = "Please enter a valid username.";
    }
	if (empty($passWord)) {
        $passwordError = "Please enter a valid password.";
    }
	//Encrypt password to prepare to insert into table after validation
	$encryptPass = password_hash($passWord, PASSWORD_DEFAULT);
	// Check if the username already exists
	$matchCheck = "SELECT * FROM userdata WHERE username = '$userID'";
	$result = $conn->query($matchCheck);

	if ($result->num_rows > 0) {
		$matchError = "Username already exists.";
	}
	$recommend = trim($_POST["discover"]);
	
    if (!empty($nameError) || !empty($addressError) || !empty($emailError) || !empty($phoneError) || !empty($usernameError) || !empty($passwordError) || !empty($matchError)) {
        $errors = true;
    }
    if (!$errors) {
        // If no errors, insert into the table
		$insertData = "INSERT INTO userdata (FirstName, LastName, Street, City, State, Zip, Phone, Email, Username, Password, Recommend) VALUES 
		('$firstName', '$lastName', '$street', '$city', '$state', '$zipCode', '$phoneNum', '$email', '$userID', '$encryptPass', '$recommend')";

		if ($conn->query($insertData) === TRUE) {
			header("location: login.html");
		} else {
			echo "Error: " . $insertData . "<br>" . $conn->error;
		}
    }
}
	$conn->close();
?>
<!DOCTYPE html PUBLIC "-//W3C//Dli XHTML 1.1//EN" "http://www.w3.org/ul/xhtml11/Dli/xhtml11.dli">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Realtor Registration</title>
		<link href="./register.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
    <section>
            <div class="container">
			<!--form start-->
				<form action="" method="post" name="register">
                    <h1>Register Your Account!</h1>
					<!--input full name, displaying error otherwise-->
                    <div class="inputgroup">
                        <input type="text" name="fName" class="<?php echo isset($nameError) ? 'error' : ''; ?>", "half"  value="<?php echo isset($_POST["fName"]) ? $_POST['fName'] : ''; ?>" placeholder="First Name"> 
                        <input type="text" name="lName" class="<?php echo isset($nameError) ? 'error' : ''; ?>", "half"  value="<?php echo isset($_POST["lName"]) ? $_POST["lName"] : ''; ?>" placeholder="Last Name"> <br>
						<span class="error"><?php echo isset($nameError) ? $nameError : ''; ?></span>						
                    </div>
					<!--input address, displaying error otherwise-->
					<h2> Address </h2>
                    <div class="inputbox">
                        <input type="text" name="addStreet" placeholder="Street" class="<?php echo isset($addressError) ? 'error' : ''; ?>"  value="<?php echo isset($_POST["addStreet"]) ? $_POST["addStreet"] : ''; ?>"> 
                    </div>
                    <div class="inputgroup">
                        <input type="text" name="addCity" placeholder="City" class="<?php echo isset($addressError) ? 'error' : ''; ?>"  value="<?php echo isset($_POST["addCity"]) ? $_POST["addCity"] : ''; ?>"> 
                        <input type="text" name="addState"  placeholder="State/Province" class="<?php echo isset($addressError) ? 'error' : ''; ?>"  value="<?php echo isset($_POST["addState"]) ? $_POST["addState"] : ''; ?>"> <br>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="addZip" placeholder="Postal/Zip Code" class="<?php echo isset($addressError) ? 'error' : ''; ?>"  value="<?php echo isset($_POST["addZip"]) ? $_POST["addZip"] : ''; ?>">
						<span class="error"><?php echo isset($addressError) ? $addressError : ''; ?></span>						
                    </div>
					<!--input telephone# & email, displaying error otherwise-->
					<h3> Telephone Number & Email </h3>
                    <div class="inputgroup">
                        <input type="text" name="phoneNum" placeholder="xxx-xxx-xxxx" class="<?php echo isset($phoneError) ? 'error' : ''; ?>"  value="<?php echo isset($_POST["phoneNum"]) ? $_POST["phoneNum"] : ''; ?>">
						<span class="error"><?php echo isset($phoneError) ? $phoneError : ''; ?></span>
                        <input type="text" name="email" placeholder="example@email.com" class="<?php echo isset($emailError) ? 'error' : ''; ?>"  value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
						<span class="error"><?php echo isset($emailError) ? $emailError : ''; ?></span>
                    </div>
					<!--input username & password, displaying error otherwise-->					
					<h5> Please Enter Your Intended Username and Password</h5>
                    <div class="inputgroup">
                        <input type="text" name="username" placeholder="Username" class="<?php echo isset($usernameError) ? 'error' : ''; ?> <?php echo isset($matchError) ? 'error' : ''; ?>" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>">
						<span class="error"><?php echo isset($usernameError) ? $usernameError : ''; ?></span>	
						<span class="error"><?php echo isset($matchError) ? $matchError : ''; ?></span>												
                        <input type="text" name="password" placeholder="Password" class="<?php echo isset($passwordError) ? 'error' : ''; ?>"  value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>"> 
						<span class="error"><?php echo isset($passwordError) ? $passwordError : ''; ?></span>						
                    </div> 
					<!--recommend select options-->					
					<div class="inputgroup">
						<label for="discover"> How did you discover us? </label>
						<select name="discover">
							<option value="ad">Advertisement</option>
							<option value="social">Social Media</option>
							<option value="people">Recommendation</option>
							<option value="search">Search Browser</option>
						</select>
					</div>
                    <button type="submit" class="button" onclick="">Register</button>
                </form>
			<!--form end--> 
            </div>
    </section>	
	</body>
</html>
