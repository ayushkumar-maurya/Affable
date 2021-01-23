<?php
	$host = 'localhost';
	$dbname = 'sme_portal';
	$user = 'root';
	$password = '';

	// Establishing connection with MySQL database 
	$conn = new PDO('mysql: host='.$host.'; dbname='.$dbname, $user, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	session_start();
?>
