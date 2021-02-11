<?php
	include "connection.php";

	if($_POST['do'] == "entry") {
		$questionid = $_POST['questionid'];
		$reason = $_POST['reason'];

		// Inserting data into cancelled consultations table
		$stmt1 = $conn->prepare("INSERT INTO cancelled_consultations(questionid, sme_email, reason) values(:questionid, :email, :reason)");
		$stmt1->execute(array(
			':questionid' => $questionid,
			':email' => $_SESSION['email'],
			':reason' => $reason
		));

		// Updating status of consultation table as cancelled
		$stmt2 = $conn->prepare("UPDATE consultation SET status = 'Cancelled' WHERE questionid = :questionid");
		$stmt2->execute(array(':questionid' => $questionid));

		echo 1;
	}

	// Sending an email to client
	if($_POST['do'] == "mail") {
		$questionid = $_POST['questionid'];
		$reason = $_POST['reason'];

		// Retieving client email from user question table
		$stmt = $conn->prepare("SELECT email from userquestion WHERE questionid = :questionid");
		$stmt->execute(array(':questionid' => $questionid));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$subject = "The consultation has been cancelled.";
		$message = 'The consultation has been cancelled by our SME due to reason:<br>';
		$message .= $reason;

		$header = "MIME-Version: 1.0 \r\n";
		$header .= "Content-Type: text/html; charset=UTF-8 \r\n";
		
		mail($row['email'], $subject, $message, $header);
	}
?>
