<?php
	include "connection.php";

	// Verifying User Registration
	if(isset($_GET['vkey']) && isset($_GET['email'])) {
		$stmt = $conn->prepare("SELECT vkey FROM user WHERE email = :email");
		$stmt->execute(array(":email" => $_GET['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($_GET['vkey'] == $row['vkey']) {
			$stmt = $conn->prepare("UPDATE user SET verified=1 where email=:email");
			$stmt->execute(array(':email' => $_GET['email']));
		}
	}
	header("Location: index.php");
?>
