<?php
	require_once __DIR__. "/../../autoload/autoload.php";
    /**
    * Kiểm tra id xem có tồn tại k để sửa
    */

    $id= intval(getInput('id')); // ép kiểu cho id
    

    $EditTransaction = $db->fetchID("transaction",$id); //hàm fetchID lấy trong database.php
    if(empty($EditTransaction)){ // nếu k tồn tại 
      $_SESSION['error']= "Dữ liệu không tồn tại";
      redirectAdmin("transaction"); // trả về trang chủ
    }
    if($EditTransaction['status'] == 1){
    	$_SESSION['error']= "Đơn hàng đã được xử lý";
      	redirectAdmin("transaction");
    }

    $status = 1 ;

    $update = $db-> update("transaction",array("status" => $status), array("id" => $id));
    if($update > 0){ // thêm thành công

                  $_SESSION['success']= "Cập nhật thành công";
                  // cập nhật sp còn lại
                  $sql = " SELECT product_id,qty FROM orders WHERE transaction_id = $id";
                  $Order = $db->fetchsql($sql);
                  foreach ($Order as $item) {
                  	$idproduct = intval($item['product_id']);
                  	$product = $db->fetchID("product",$idproduct);
                  	$number = $product['number'] - $item['qty'];
                  	$up_pro - $db->update("product",array("number"=>$number,"pay"=>$product['pay']+1),array("id"=>$idproduct));
                  }
                  redirectAdmin("transaction");  // 
                }
              else {
                // thêm thất bại
                  $_SESSION['error']= "Dữ liệu không thay đổi";
                  redirectAdmin("transaction");
        }

?>