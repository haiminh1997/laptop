<?php
	require_once __DIR__. "/autoload/autoload.php"; // Ctrl+Shift+P
    $key = intval(getInput('key'));  //lấy id
    unset($_SESSION['cart'][$key]);
    $_SESSION['success'] = "Xóa sản phẩm thành công!!!";
    header("location: gio-hang.php");

?>