<?php
	include "connection.php";
	
	// Retrieving user requests from table
	$stmt1 = $conn->prepare("SELECT questionid, category, question, status FROM userquestion WHERE email = :email");
	$stmt1->execute(array(":email" => $_SESSION['email']));

	$reqCount = 1;
	while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
		echo "<h2>REQUEST ID $reqCount</h2>";
		$request = $row1;
		
		// Retrieving sme answer from table
		$stmt2 = $conn->prepare("SELECT answered_by, answer FROM sme_answer WHERE questionId = :questionId");
		$stmt2->execute(array(":questionId" => $request['questionid']));
		if($stmt2->rowCount() == 0) {
			$seen_by = "";
			$answer = "";
		}
		else {
			$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
			$answer = $row2['answer'];

			// Retrieving sme name from table
			$stmt3 = $conn->prepare("SELECT name FROM sme_profile WHERE email = :email");
			$stmt3->execute(array(":email" => $row2['answered_by']));
			$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
			$seen_by = $row3['name'];
		}
		
		// Retrieving consultancy status from table
		$stmt4 = $conn->prepare("SELECT status FROM consultation WHERE questionId = :questionId");
		$stmt4->execute(array(":questionId" => $request['questionid']));
		if($stmt4->rowCount() == 0)
			$status = "Pending";
		else {
			$row4 = $stmt4->fetch(PDO::FETCH_ASSOC);
			$status = $row4['status'];
		}
?>

<pre>
Request ID: <?= $request['questionid'] ?>

Category: <?= $request['category'] ?>

Question: <?= $request['question'] ?>

Seen by: <?= $seen_by ?>

Status: <?= $request['status'] ?>

SME's reply: <?= $answer ?>

Consultation status: <?= $status ?>
</pre>

<?php 
		$reqCount++;
	}
?>
