<?php
	include "connection.php";
	include "base.php";
	
	// User Sign In Entry Validation
	$email = $_POST['email'];
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		echo "Please enter valid Email address";
		
	else {
		$stmt = $conn->prepare("SELECT email FROM user WHERE email = :email");
		$stmt->execute(array(":email" => $email));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		// Validating the credentials
		if($stmt->rowCount() == 0)
			echo "Account $email does not exist";
		else
		{
		//	echo "Please check your email inbox or spam folder to change Password.";
		
		$key=md5(time()+123456789% rand(4000, 55000000));
        //insert this temporary key into database
        $sql_insert=mysqli_query($db,"INSERT INTO forgot_password(email,temp_key) VALUES('$email','$key')");
        //sending email about update
        $to      = $email;
		$subject = 'SME Portal Password Reset';
		$msg = "<a href='".BASE_URL."/user_forgot_password_reset.php?key=".$key."&email=".$email."' style=' background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Click To Reset password</a>";
		//$headers = "From: <Website's email address> \r\n";
		$headers = "MIME-Version: 1.0 \r\n";
		$headers = "Content-Type: text/html; charset=UTF-8 \r\n";
		mail($to, $subject, $msg, $headers);
				
		}
	}
?>