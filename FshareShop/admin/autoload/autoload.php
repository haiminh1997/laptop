<?php
	// file này giúp tự động gọi ra các file cần thiết khi khai báo trog các file khác( file chung)

	session_start();
	require_once __DIR__. "/../../libraries/Database.php";
	require_once __DIR__. "/../../libraries/Function.php";
	$db= new Database;	


	if( ! isset($_SESSION['admin_id'])){
		header("location: /laptop/FshareShop/login/");
	}

	define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/laptop/FshareShop/public/uploads/");

	
?>
