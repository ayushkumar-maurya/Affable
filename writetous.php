<?php
	include "base.php";
	
	// Write to us
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$message = trim($_POST['message']);

	$subject = 'Write to us';
	
	$body = "<b>Name:</b> ".$name."<br>";
	$body .= "<b>From:</b> ".$email."<br><br>";
	$body .= "<b>Message:</b><br>".$message;

	$header = "MIME-Version: 1.0 \r\n";
	$header .= "Content-Type: text/html; charset=UTF-8 \r\n";
	
	mail(RECIPIENT_EMAIL, $subject, $body, $header);
	echo 1;
?>
