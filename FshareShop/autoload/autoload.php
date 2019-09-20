<?php

	session_start();
	// file này giúp tự động gọi ra các file cần thiết khi khai báo trog các file khác( file chung)


	require_once __DIR__. "/../libraries/Database.php"; //gọi đến file Database.php
	require_once __DIR__. "/../libraries/Function.php"; //gọi đến file Function.php
	$db= new Database;

	define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/laptop/FshareShop/public/uploads/");


	$category = $db-> fetchAll("category");

	/**
	* Lấy danh sách sản phẩm mới
	*/

	$sqlNew = "SELECT * FROM  product WHERE 1 ORDER BY ID DESC LIMIT 3 ";
	$productNew= $db-> fetchsql($sqlNew);


	/**
	* Lấy danh sách sp bán chạy,sắp xếp theo Pay
	*/
	$sqlPay = "SELECT * FROM product WHERE 1 ORDER BY PAY DESC LIMIT 3";
	$productPay = $db->fetchsql($sqlPay); 
?>
