<?php // logout.php
include_once 'connection.php';

if (isset($_SESSION['email']))
{
	session_unset();
	header("Location:index.php");
}

?>