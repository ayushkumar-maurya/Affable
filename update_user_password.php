<?php
	include "connection.php";

	// Validating user's old password
	$old_password = $_POST['oldPassword'];
	$new_password = $_POST['newPassword'];

	$stmt = $conn->prepare("SELECT password FROM user WHERE email = :email");
	$stmt->execute(array(":email" => $_SESSION['email']));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if(!password_verify($old_password, $row['password']))
		echo "Incorrect old password";
	else {
		// Updating user password
		$stmt = $conn->prepare("UPDATE user SET password = :hash WHERE email = :email");
		$stmt->execute(array(
			":hash" => password_hash($new_password, PASSWORD_DEFAULT),
			":email" => $_SESSION['email']
		));
		echo 0;
	}
?>
