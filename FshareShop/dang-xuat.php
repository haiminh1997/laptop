<?php
	

	session_start();
	unset($_SESSION['admin-name']);
	unset($_SESSION['admin-id']);

	header("location: index.php");

?>