<?php
	include "connection.php";

	// User registration Entry Validation
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$phoneNumber = trim($_POST['phone']);
	$password = $_POST['password'];
	$confirm_password = $_POST['cpassword'];

	if(strlen($name) == 0)
		echo "Please enter your name";
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
		echo "Please enter valid Email address";
	elseif (!isset($phoneNumber) || !preg_match('/^[0-9]{10}$/', $phoneNumber))
		echo "Please enter valid Phone number";
	elseif(strlen($password) == 0)
		echo "Please fill out password field";
	elseif(strlen($confirm_password) == 0)
		echo "Please fill out confirm password field";
	elseif($password !== $confirm_password)
		echo "Passwords do not match";
	
	else {
		// Validating the unavailability of email address
		$stmt = $conn->prepare("SELECT email FROM sme_profile WHERE email = :email");
		$stmt->execute(array(":email" => $email));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() == 1)
			echo "$email is not available";
		else
			echo 0;
	}
?>
