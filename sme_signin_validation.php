<?php
	include "connection.php";
	
	// User Sign In Entry Validation
	$email = trim($_POST['email']);
	$password = $_POST['password'];
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		echo "Please enter valid Email address";
	elseif(strlen($password) == 0)
		echo "Please fill out password field";
	
	else {
		$stmt = $conn->prepare("SELECT name, email, password, verified FROM sme_profile WHERE email = :email");
		$stmt->execute(array(":email" => $email));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		// Validating the credentials
		if($stmt->rowCount() == 0)
			echo "Account $email does not exist";
		elseif(!password_verify($password, $row['password']))
			echo "Incorrect Password";
		elseif($row['verified'] == 0)
			echo "Account $email is not verified";
		else
		   $email=$row['email'];
		  // session_start();
		   $_SESSION['email']=$email;
		   
	}
?>
