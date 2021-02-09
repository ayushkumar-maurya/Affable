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

	$sql = "INSERT INTO sme_profile (email, name, phone, password, verified, vkey, review_rating) VALUES (:email, :name, :phone, :hash, 0, :vkey, 4.0)";
	$stmt = $conn->prepare($sql);
	$stmt->execute(array(
		':email' => $email,
		':name' => $name,
		':phone' => $phoneNumber,
		':hash' => $hash,
		":vkey" => $vkey
	));
	
		//$sme_code='SME0000'; 
		//++$sme_code;
		//$randomid = rand(100,1000);
		$last_id = $conn->lastInsertId();
		//$sme_code="SME".$randomid.$last_id."";
		$sme_code="SME0000".$last_id."";
		$query1='UPDATE sme_profile set sme_code ="'.$sme_code.'" WHERE email ="'.$email.'"';              
		$res1=mysqli_query($db,$query1); 
		
 
	

	// Sending verification email
	$subject = 'SME Registration Verification';
	
	$message = "You have been registered for SME Portal.<br>";
	$message = "Your Unique Code on SME Portal is ".$sme_code.".<br>";
	$message .= "Please <a href='".BASE_URL."/sme_registration_verification.php?vkey=".$vkey."&email=".$email."'>click here</a> to Login.";
	
	$header = "MIME-Version: 1.0 \r\n";
	$header .= "Content-Type: text/html; charset=UTF-8 \r\n";
	
	mail($email, $subject, $message, $header);
?>
