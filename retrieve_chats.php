<?php
	include "connection.php";

	$userid = $_POST['userid'];
	$questionid = $_POST['questionid'];
	$msgCnt = $_POST['msgCnt'];

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
	$fromMsgCnt = $row1['userClrCount'] + $msgCnt;
	$remMsgCnt = $row1['msgCount'] - $fromMsgCnt;

	// Retrieving messages between two users
	$sql2 = "SELECT * FROM messages WHERE senderid IN (:sid, :rid) AND recieverid IN (:sid, :rid) AND questionid = :questionid ORDER BY date_time LIMIT $fromMsgCnt, $remMsgCnt";
	$stmt2 = $conn->prepare($sql2);
	$stmt2->execute(array(
		":sid" => $_SESSION['email'],
		":rid" => $userid,
		":questionid" => $questionid
	));
	
	$msgs = array();
	$i = 0;
	while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
		$filename = "";
		$tempname = "";
		if($row2['isFile'] == 1) {
			// Retrieving attachment
			$stmt3 = $conn->prepare("SELECT filename, tempname FROM attachments WHERE msgid = :msgid");
			$stmt3->execute(array(":msgid" => $row2['msgid']));
			$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
			$filename = $row3['filename'];
			$tempname = $row3['tempname'];
		}

		$msgs[$i++] = array(
			htmlentities($row2['message']),
			htmlentities($filename),
			$tempname,
			$row2['date_time'],
			($userid == $row2['senderid'] ? 0 : 1)
		);
	}
	echo json_encode($msgs);
?>
