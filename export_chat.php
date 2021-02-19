<?php
include "connection.php";

$userid = $_POST['userid'];
$user = $_POST['user'];
$questionid = $_POST['questionid'];

// Retrieving message counts between two users
$sql1 = "SELECT msgCount, ";
$sql1 .= "CASE WHEN user1id = :sid AND user2id = :rid THEN user1ClrCount ELSE user2ClrCount END ";
$sql1 .= "AS userClrCount FROM chats_count WHERE user1id IN (:sid, :rid) AND user2id IN (:sid, :rid) AND questionid = :questionid";

$stmt1 = $conn->prepare($sql1);
$stmt1->execute(array(
	":sid" => $_SESSION['email'],
	":rid" => $userid,
	":questionid" => $questionid
));
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
$fromMsgCnt = $row1['userClrCount'];
$remMsgCnt = $row1['msgCount'] - $fromMsgCnt;

// Retrieving messages between two users
$sql2 = "SELECT senderid, recieverid, message, date_time FROM messages WHERE senderid IN (:sid, :rid) AND recieverid IN (:sid, :rid) AND questionid = :questionid ORDER BY date_time LIMIT $fromMsgCnt, $remMsgCnt";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute(array(
	":sid" => $_SESSION['email'],
	":rid" => $userid,
	":questionid" => $questionid
));

$chats = "";
while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
	$date_time = $row2['date_time'];
	$message = $row2['message'];
	$from_user = ($userid == $row2['senderid']) ? $user : $_SESSION['user'];
	
	$chats .= ("[$date_time] $from_user:- $message\n\n");
}

$dir = "export_chat/";
$filename = "Chat with $user.txt";
$file = fopen($dir.$filename, "w");
fwrite($file, $chats);
fclose($file);

echo $filename;
?>
