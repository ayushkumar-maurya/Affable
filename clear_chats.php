<?php
include "connection.php";

$userid = $_POST['userid'];
$questionid = $_POST['questionid'];

// Retrieving message counts between two users
$stmt1 = $conn->prepare("SELECT msgCount FROM chats_count WHERE user1id IN (:sid, :rid) AND user2id IN (:sid, :rid) AND questionid = :questionid");
$stmt1->execute(array(
	":sid" => $_SESSION['email'],
	":rid" => $userid,
	":questionid" => $questionid
));
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

// Updating cleared chats in chats count table
$sql2 = "UPDATE chats_count SET user1ClrCount = CASE ";
$sql2 .= "WHEN user1id = :sid AND user2id = :rid AND questionid = :questionid THEN :msgCnt ELSE user1ClrCount END, ";
$sql2 .= "user2ClrCount = CASE ";
$sql2 .= "WHEN user1id = :rid AND user2id = :sid AND questionid = :questionid THEN :msgCnt ELSE user2ClrCount END;";

$stmt2 = $conn->prepare($sql2);
$stmt2->execute(array(
	":sid" => $_SESSION['email'],
	":rid" => $userid,
	":questionid" => $questionid,
	":msgCnt" => $row1['msgCount']
));
?>
