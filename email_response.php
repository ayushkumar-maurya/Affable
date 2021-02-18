<?php
	include "connection.php";
	
	$to = $_POST['client_email'];
	$topic=$_POST['topic'];
	$question=$_POST['question'];
	$sme_thoughts=$_POST['sme_thoughts'];
	$sme_name=$_POST['sme_name'];
	$sme_email=$_POST['sme_email'];
	$Qid=$_POST['Qid'];
	
	//Uploaded File Details
	$ans_file = $_FILES['file'];
	$ans_file_name = $ans_file['name'];
	$ans_file_type = $ans_file['type'];
	$tmp_name = $ans_file['tmp_name'];
	$ans_file_size = $ans_file['size'];
	
	//Start Mail Function here
	$subject = 'Email Consultation by SME';
	$from = $_SESSION['email'];
	$aa=filesize($tmp_name);
	$headers = "From: $from";
	$message = "<b>Topic</b> - ".$topic."<br>";
	$message .= "<b>Your Question</b> - ".$question."<br>";
	$message .= "<b>Answered by</b> - ".$sme_name."<br>";
	$message .= "<b>sme's Answer</b> - ".$sme_thoughts."<br>";
	$message .= "<b>sme's Attachment</b> - ";
	
	$file = fopen($tmp_name,'sme_ans');
	$data = fread($file,filesize($tmp_name));
	fclose($file);
	$semi_rand = md5(time());

	$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
	$headers .= "\nMIME-Version: 1.0\n" ."Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
	// Add a multipart boundary above the plain message
	$message .= "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" ."Content-Type: text/html; charset=\"iso-8859-1\"\n" ."Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
	// Base64 encode the file data
	$data = chunk_split(base64_encode($data));
	// Add file attachment to the message
	$message .= "--{$mime_boundary}\n" ."Content-Type: {$ans_file_type};\n" . " name=\"{$ans_file_name}\"\n" ."Content-Transfer-Encoding: base64\n\n" .
	$data . "\n\n" ."--{$mime_boundary}--\n";

	// Send the message;
	$ok = @mail($to, $subject, $message, $headers);
	
	
	
	$sql = "INSERT INTO consultation(clientEmailId, smeEmailId, questionId, mode, status)";
		$sql .= " VALUES(:clientEmailId, :smeEmailId, :questionId, :mode, 'Consultation done through Email')";
		$stmt2 = $conn->prepare($sql);
		$stmt2->execute(array(
			":clientEmailId" => $to,
			":smeEmailId" => $sme_email,
			":questionId" => $Qid,
			":mode" => "Email"
			
			
		));


?>
