<?php 
  $open="category";
    require_once __DIR__. "/../../autoload/autoload.php";
    

    $id= intval(getInput('id')); // ép kiểu cho id
    

    $EditCategory = $db->fetchID("category",$id); //hàm fetchID lấy trong database.php
    if(empty($EditCategory)){ // nếu k tồn tại 
      $_SESSION['error']= "Dữ liệu không tồn tại";
      redirectAdmin("category"); // trả về trang chủ
    }
    /**
    * Kiểm tra xem danh mục đã có sp chưa.nếu có rồi thì k đc xóa
    */
    $is_product = $db->fetchOne("product"," category_id= $id ");
    if( $is_product == NULL ){
      $num= $db->delete("category",$id);
      if($num>0){
        $_SESSION['success']= "Xóa thành công";
        redirectAdmin("category");
      }
      else {
        $_SESSION['error']= "Xóa thất bại";
        redirectAdmin("category");

           }

    }
    else {
       $_SESSION['error']= "Xóa thất bại.Danh mục có sản phẩm bạn k đc xóa";
        redirectAdmin("category");

    }
   
?>
        