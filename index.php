<?php
	include "connection.php";
	
	// User registration Entry Validation
	if(isset($_POST['register'])) {
		$name = trim($_POST['name']);
		$email = trim($_POST['reg-email']);
		$phoneNumber = trim($_POST['phone']);
		$password = $_POST['reg-password'];
		$confirm_password = $_POST['confirm-password'];
		
		if(strlen($name) == 0)
			$_SESSION['reg_error'] = "Please enter your name";
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
			$_SESSION['reg_error'] = "Please enter valid Email address";
		elseif (!isset($phoneNumber) || !preg_match('/^[0-9]{10}$/', $phoneNumber))
			$_SESSION['reg_error'] = "Please enter valid Phone number";
		elseif(strlen($password) == 0)
			$_SESSION['reg_error'] = "Please fill out password field";
		elseif(strlen($confirm_password) == 0)
			$_SESSION['reg_error'] = "Please fill out confirm password field";
		elseif($password !== $confirm_password)
			$_SESSION['reg_error'] = "Passwords do not match";
		
		else {
			// Validating the unavailability of email address
			$stmt = $conn->prepare("SELECT email FROM user WHERE email = :email");
			$stmt->execute(array(":email" => $email));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
				$_SESSION['reg_error'] = "$email is not available";
			
			else {

				// Sending confirmation email
				$subject = 'SME User Registration Confirmation';
				$message = "You are registered to SME Portal.";
				$headers = "From: <sender's email id> \r\n";
				$headers .= "MIME-Version: 1.0 \r\n";
				$headers .= "Content-Type: text/html; charset=UTF-8 \r\n";
				mail($email, $subject, $message, $headers);

				// Inserting user data in database
				$hash = password_hash($password, PASSWORD_DEFAULT);
				$sql = "INSERT INTO user (email, name, phoneNumber, password) VALUES (:email, :name, :phoneNumber, :hash)";
				$stmt = $conn->prepare($sql);
				$stmt->execute(array(
					':email' => $email,
					':name' => $name,
					':phoneNumber' => $phoneNumber,
					':hash' => $hash
				));
				// 
				echo "Welcome ".htmlentities($name);
			}
		}
	}


	// User Sign In Entry Validation
	if(isset($_POST['signin'])) {
		$email = trim($_POST['signin-email']);
		$password = $_POST['signin-password'];
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			$_SESSION['signin_error'] = "Please enter valid Email address";
		elseif(strlen($password) == 0)
			$_SESSION['signin_error'] = "Please fill out password field";

		else {
			$stmt = $conn->prepare("SELECT name, email, password FROM user WHERE email = :email");
			$stmt->execute(array(":email" => $email));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			// Validating the credentials
			if($stmt->rowCount() == 0)
				$_SESSION['signin_error'] = "Account $email doesn't exist";
			elseif(!password_verify($password, $row['password']))
				$_SESSION['signin_error'] = "Incorrect Password";
			
			else {
				// 
				echo "Welcome ".htmlentities($row['name']);
			}
		}
	}
?>

<html>
<body>

	<form action method='POST'>
		<label for="name">Name:</label><br>
		<input type="text" id="name" name="name"><br>
		<label for="reg-email">Email:</label><br>
		<input type="text" id="reg-email" name="reg-email"><br>
		<label for="phone">Phone:</label><br>
		<input type="text" id="phone" name="phone"><br>
		<label for="reg-password">Password:</label><br>
		<input type="password" id="reg-password" name="reg-password"><br>
		<label for="confirm-password">Confirm Password:</label><br>
		<input type="password" id="confirm-password" name="confirm-password"><br>
		<input type="submit" name="register" value="Register"><br>
	
		<?php
			if(isset($_SESSION['reg_error'])) {
				echo $_SESSION['reg_error'];
				unset($_SESSION['reg_error']);
			}
			if(isset($msg)) {
				echo $msg;
				unset($msg);
			}
		?>
	</form>

	<form action method='POST'>
		<label for="signin-email">Email:</label><br>
		<input type="text" id="signin-email" name="signin-email"><br>
		<label for="signin-password">Password:</label><br>
		<input type="password" id="signin-password" name="signin-password"><br>
		<input type="submit" name="signin" value="Sign In"><br>
	
		<?php
			if(isset($_SESSION['signin_error']))
				echo $_SESSION['signin_error'];
				unset($_SESSION['signin_error']);
		?>
	</form>
</body>
</html>
