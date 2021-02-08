<?php
	include "connection.php";

	// Retrieving sme code, question and consultation slots from table
	if($_POST['do'] == "retreive_slots") {
		$questionid = $_POST['questionid'];
		$_SESSION['questionid'] = $questionid;

		// Retrieving consultation slots from table
		$stmt1 = $conn->prepare("SELECT * FROM consultation_slots WHERE questionid = :questionid");
		$stmt1->execute(array(":questionid" => $questionid));
		$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
		
		// Retrieving sme code from table
		$stmt2 = $conn->prepare("SELECT sme_code FROM sme_profile WHERE email = :email");
		$stmt2->execute(array(":email" => $row1['sme_email']));
		$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
		
		// Retrieving question from table
		$stmt3 = $conn->prepare("SELECT question FROM userquestion WHERE questionid = :questionid");
		$stmt3->execute(array(":questionid" => $questionid));
		$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);

		$data = $row1;
		$data['sme_code'] = htmlentities($row2['sme_code']);
		$data['question'] = htmlentities($row3['question']);
		echo json_encode($data);
	}

	if($_POST['do'] == "enter_slot") {
		$slot = $_POST['slot'];
		$questionid = $_SESSION['questionid'];

		// Retrieving data from consultation slots table
		$stmt1 = $conn->prepare("SELECT * FROM consultation_slots WHERE questionid = :questionid");
		$stmt1->execute(array(":questionid" => $questionid));
		$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
		$sme_email = $row1['sme_email'];
		$mode = $row1['mode_of_cons'];
		$date = $row1['slot'.$slot.'_date'];
		$from_time = $row1['slot'.$slot.'_from_time'];
		$to_time = $row1['slot'.$slot.'_to_time'];

		// Inserting final confirmed slot and mode of consultation into consultation table
		$sql = "INSERT INTO consultation(clientEmailId, smeEmailId, questionId, mode, date, fromTime, toTime, status)";
		$sql .= " VALUES(:clientEmailId, :smeEmailId, :questionId, :mode, :date, :fromTime, :toTime, 'Pending')";
		$stmt2 = $conn->prepare($sql);
		$stmt2->execute(array(
			":clientEmailId" => $_SESSION['email'],
			":smeEmailId" => $sme_email,
			":questionId" => $questionid,
			":mode" => $mode,
			":date" => $date,
			":fromTime" => $from_time,
			":toTime" => $to_time
		));

		// Updating status in user question table
		$stmt3 = $conn->prepare("UPDATE userquestion SET status='Consultation confirmed' WHERE questionid = :questionid");
		$stmt3->execute(array(":questionid" => $questionid));

		// Deleting consultation slots record from consultation slots table
		$stmt4 = $conn->prepare("DELETE FROM consultation_slots WHERE questionid = :questionid");
		$stmt4->execute(array(":questionid" => $questionid));

		echo $sme_email;
	}

	// Sending an email to SME
	if($_POST['do'] == "mail") {		
		$subject = "Consultation slot confirmed by client";
		$message = 'Consultation slot has be confirmed by the client.';

		$header = "MIME-Version: 1.0 \r\n";
		$header .= "Content-Type: text/html; charset=UTF-8 \r\n";
		
		mail($_POST['sme_email'], $subject, $message, $header);
	}
?>
