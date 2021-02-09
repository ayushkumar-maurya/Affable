<?php
	include "connection.php";

	// Verifying User Registration
	if(isset($_GET['vkey']) && isset($_GET['email'])) {
		$stmt = $conn->prepare("SELECT vkey FROM sme_profile WHERE email = :email");
		$stmt->execute(array(":email" => $_GET['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($_GET['vkey'] == $row['vkey']) {
			$stmt = $conn->prepare("UPDATE sme_profile SET verified=1 where email=:email");
			$stmt->execute(array(':email' => $_GET['email']));
		}
	}
	header("Location: index.php?smeSignIn=1");
?>
