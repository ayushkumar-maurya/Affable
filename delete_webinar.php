<?php
require_once ('connection.php');



		$webinarid = $_POST['webinarid'];
			
		$stmt1 = $conn->prepare("delete from sme_webinar WHERE webinar_id = :webinarid");
		$stmt1->execute(array(":webinarid" => $webinarid));
		
		echo 1;
	

?>