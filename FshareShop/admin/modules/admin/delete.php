<?php 
  $open="category";
    require_once __DIR__. "/../../autoload/autoload.php";
    

    $id= intval(getInput('id')); // ép kiểu cho id
    

    $DeleteAdmin = $db->fetchID("admin",$id); //hàm fetchID lấy trong database.php
    if(empty($DeleteAdmin)){ // nếu k tồn tại 
      $_SESSION['error']= "Dữ liệu không tồn tại";
      redirectAdmin("admin"); // trả về trang chủ
    }
    
   $num= $db->delete("admin",$id);
   if($num>0){
      $_SESSION['success']= "Xóa thành công";
      redirectAdmin("admin");
   }
   else {
     $_SESSION['error']= "Xóa thất bại";
    redirectAdmin("admin");

   }
?>
        