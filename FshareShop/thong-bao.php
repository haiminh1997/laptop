<?php 
 // Gọi đến file autoload bên ngoài admin
    require_once __DIR__. "/autoload/autoload.php"; // Ctrl+Shift+P
    unset($_SESSION['cart']);
    	unset($_SESSION['total']);

?>

<?php 
    require_once __DIR__. "/layouts/header.php"; // Ctrl+Shift+P
?>


<div class="col-md-9 ">
    <section class="box-main1">
        <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> Thông báo thanh toán </a> </h3>
        <?php if (isset($_SESSION['success'])): ?>
        	<div class="alert alert-success">
        		<?php 
        			echo $_SESSION['success'] ; 
        			unset($_SESSION['success']);
        		 ?>
        	</div>
        <?php endif ?>
        <a href="index.php" class="btn btn-success">Trở về trang chủ</a>
     </section>
</div>


<?php 
    require_once __DIR__. "/layouts/footer.php";
?>
               

      