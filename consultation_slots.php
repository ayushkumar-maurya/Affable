<?php
	include "connection.php";

	if($_POST['do'] == "accept_request") {
		$questionid = $_POST['questionid'];
		$mode_of_cons = $_POST['mode_of_cons'];
		
		// Inserting data in sme answer table
		$stmt1 = $conn->prepare("INSERT INTO sme_answer(questionid, answered_by, answer) VALUES (:questionid, :email, :answer)");
		$stmt1->execute(array(
			":questionid" => $questionid,
			":email" => $_SESSION['email'],
			":answer" => $_POST['answer']
		));

		// Updating status of client question as accepted
		$stmt2 = $conn->prepare("UPDATE userquestion SET status = 'Accepted' WHERE questionid = :questionid");
		$stmt2->execute(array(":questionid" => $questionid));

		// Retrieving client's email from user question table
		$stmt3 = $conn->prepare("SELECT email FROM userquestion WHERE questionid = :questionid");
		$stmt3->execute(array(":questionid" => $questionid));
		$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
		$client_email = $row3['email'];

		if($mode_of_cons != "email") {
			// Inserting SME's selected slots in consultation slots table
			$sql = "INSERT INTO consultation_slots(sme_email, client_email, questionid, mode_of_cons, ";
			$sql .= "slot1_date, slot1_from_time, slot1_to_time, slot2_date, slot2_from_time, slot2_to_time, slot3_date, slot3_from_time, slot3_to_time) ";
			$sql .= " VALUES(:sme_email, :client_email, :questionid, :mode_of_cons, ";
			$sql .= ":slot1_date, :slot1_from_time, :slot1_to_time, :slot2_date, :slot2_from_time, :slot2_to_time, :slot3_date, :slot3_from_time, :slot3_to_time)";
			
			$stmt4 = $conn->prepare($sql);

			$stmt4->execute(array(
				":sme_email" => $_SESSION['email'],
				":client_email" => $client_email,
				":questionid" => $questionid,
				":mode_of_cons" => $mode_of_cons,
				":slot1_date" => $_POST['date1'],
				":slot1_from_time" => $_POST['ftime1'],
				":slot1_to_time" => $_POST['ttime1'],
				":slot2_date" => $_POST['date2'],
				":slot2_from_time" => $_POST['ftime2'],
				":slot2_to_time" => $_POST['ttime2'],
				":slot3_date" => $_POST['date3'],
				":slot3_from_time" => $_POST['ftime3'],
				":slot3_to_time" => $_POST['ttime3']
			));
		}

		echo $client_email;
	}

	if($_POST['do'] == "decline_request") {
		$questionid = $_POST['questionid'];
		
		// Updating status of client question as declined
		$stmt = $conn->prepare("UPDATE userquestion SET status = 'Declined' WHERE questionid = :questionid");
		$stmt->execute(array(":questionid" => $questionid));
		
		echo 1;
	}

	// Sending an email to Client
	if($_POST['do'] == "mail") {	
		$subject = "Request accepted";
		$message = 'Your request is accepted by our SME.';

		$header = "MIME-Version: 1.0 \r\n";
		$header .= "Content-Type: text/html; charset=UTF-8 \r\n";
		
		mail($_POST['client_email'], $subject, $message, $header);
	}

?>
