<!-- gói gọn các thông báo lỗi trong file này để tối ưu hóa code -->

<?php if(isset($_SESSION['success'])) :?>  <!-- Nếu thêm mới danh mục thành côg
 --> 		<div class="alert alert-success">  <!-- thông báo của bootstrap -->
 				<?php echo $_SESSION['success'] ; unset($_SESSION['success'])?> 
 				<!-- unset hủy session -->
 			</div>
 <?php endif ; ?>
 <?php if(isset($_SESSION['error'])) :?>  
  <div class="alert alert-danger">  
    <?php echo $_SESSION['error'] ; unset($_SESSION['error'])?> 
  </div>
 <?php endif ; ?>  

