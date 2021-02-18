<?php // logout.php
include_once 'connection.php';

if (isset($_SESSION['email']))
{
	unset($_SESSION['email']);
	header("Location:index.php");
}

?>