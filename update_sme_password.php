<?php
	include "connection.php";


	$old_password = $_POST['oldPassword'];
	$new_password = $_POST['newPassword'];

	$stmt = $conn->prepare("SELECT password FROM sme_profile WHERE email = :email");
	$stmt->execute(array(":email" => $_SESSION['email']));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if(!password_verify($old_password, $row['password']))
		echo "Incorrect old password";
	else {

		$stmt = $conn->prepare("UPDATE sme_profile SET password = :hash WHERE email = :email");
		$stmt->execute(array(
			":hash" => password_hash($new_password, PASSWORD_DEFAULT),
			":email" => $_SESSION['email']
		));
		echo 0;
	}
?>
