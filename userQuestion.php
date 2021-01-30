<?php
	include "connection.php";

	// Inserting user question in table
	if($_POST['do'] == "entry") {
		$category = $_POST['category'];
		$topic = $_POST['topic'];
		$question = $_POST['question'];
		
		$sql = "INSERT INTO userquestion(category, topic, question, email) values(:category, :topic, :question, :email)";
		$stmt = $conn->prepare($sql);
		$stmt->execute(array(
			':category' => $category,
			':topic' => $topic,
			':question' => $question,
			':email' => $_SESSION['email']
		));
		echo 1;
	}
	
	// Sending an email to user
	if($_POST['do'] == "mail") {
		$subject = "Question has been sent to our SME";
		$message = 'Your question has been sent to our SME for review.';

		$header = "MIME-Version: 1.0 \r\n";
		$header .= "Content-Type: text/html; charset=UTF-8 \r\n";
		
		mail($_SESSION['email'], $subject, $message, $header);
	}
?>
