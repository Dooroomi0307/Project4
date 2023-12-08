<!--Dream Realtor Registration HTML File, allowing new buyers to register. -->
<?php
	$errors = array();
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Validate the first and last name
    $firstName = trim($_POST["fName"]);
    $lastName = trim($_POST["lName"]);
    if (empty($firstName) || empty($lastName)) {
        $errors[] = "Please enter both first name and last name.";
    }
    $street = trim($_POST["addStreet"]);
    $city = trim($_POST["addCity"]);
    $state = trim($_POST["addState"]);
    $zipCode = trim($_POST["addZip"]);
    if (empty($street) || empty($city) || empty($state) || empty($zipCode)) {
        $errors[] = "Please enter your complete address.";
    }
	$email = trim($_POST["email"]);
	$emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
	if (!preg_match($emailPattern, $email)) {
		$errors[] = "Please enter a valid email address.";
	}
    $phoneNum = trim($_POST["phoneNum"]);
    if (!preg_match("/^\d{3}-\d{3}-\d{4}$/", $phoneNum)) {
        $errors[] = "Please with the required format xxx-xxx-xxxx.";
    }
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    if (empty($username) || empty($password)) {
        $errors[] = "Please enter both username and password.";
    }
	if (empty($errors)) {
    // if no errors, go to register-submit.php
        header("Location: register-submit.php");
        exit();
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//Dli XHTML 1.1//EN" "http://www.w3.org/ul/xhtml11/Dli/xhtml11.dli">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Dream House Realtor Registration</title>
		<link href="./register.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
    <section>
            <div class="container">
			<!--form start-->
				<form action="" method="post" name="register">
                    <h1>Register Your Account!</h1>
                    <div class="inputgroup">
                        <input type="text" name="fName" class="half" placeholder="First Name"> 
                        <input type="text" name="lName" class="half" placeholder="Last Name">
                    </div>
					<h2> Billing Address </h2>
                    <div class="inputbox">
                        <input type="text" name="addStreet" placeholder="Street"> 
                    </div>
                    <div class="inputgroup">
                        <input type="text" name="addCity" placeholder="City"> 
                        <input type="text" name="addState"  placeholder="State/Province"> <br>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="addZip" placeholder="Postal/Zip Code"> 
                    </div>
					<h3> Telephone Number & Email </h3>
                    <div class="inputgroup">
                        <input type="text" name="phoneNum" placeholder="xxx-xxx-xxxx">
                        <input type="text" name="email" placeholder="example@email.com"> 
                    </div>			
					<h5> Please Enter Your Intended Username and Password</h5>
                    <div class="inputgroup">
                        <input type="text" name="username" placeholder="Username"> 
                        <input type="text" name="password" placeholder="Password"> 
                    </div> 
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
<?php	if (!empty($errors)) {
		echo '<p>Please fix the following errors:</p>';
		echo '<ul>';
		foreach ($errors as $error) {
			echo '<li>' . $error . '</li>';
		}
			echo '</ul>';
			echo '</div>';
	} ?>
            </div>
    </section>	
	</body>
</html>