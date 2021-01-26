<?php
	include "connection.php";

	// Inserting user data in database
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$phoneNumber = trim($_POST['phone']);
	$password = $_POST['password'];
	$hash = password_hash($password, PASSWORD_DEFAULT);
	$vkey = md5(time().$email);

	$sql = "INSERT INTO user (email, name, phoneNumber, password, verified, vkey) VALUES (:email, :name, :phoneNumber, :hash, 0, :vkey)";
	$stmt = $conn->prepare($sql);
	$stmt->execute(array(
		':email' => $email,
		':name' => $name,
		':phoneNumber' => $phoneNumber,
		':hash' => $hash,
		":vkey" => $vkey
	));

	// Sending verification email
	$subject = 'SME User Registration Verification';
	
	$message = "You have been registered for SME Portal.<br>";
	$message .= "Please <a href='http://localhost/Affable/user_registration_verification.php?vkey=".$vkey."&email=".$email."'>click here</a> to confirm your registration.";
	
	$headers = "From: <Website's email address> \r\n";
	$headers .= "MIME-Version: 1.0 \r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8 \r\n";
	
	mail($email, $subject, $message, $headers);
?>
