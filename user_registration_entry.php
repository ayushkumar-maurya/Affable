<?php
	include "base.php";
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
	$subject = 'User Registration Verification';
	
	$message = "You have been registered for SME Portal.<br>";
	$message .= "Please <a href='".BASE_URL."/user_registration_verification.php?vkey=".$vkey."&email=".$email."'>click here</a> to Login.";
	
	$header = "MIME-Version: 1.0 \r\n";
	$header .= "Content-Type: text/html; charset=UTF-8 \r\n";
	
	mail($email, $subject, $message, $header);
?>
