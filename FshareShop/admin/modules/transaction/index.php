<!-- hiển thị danh sách  -->
<?php 
    $open="transaction";
    require_once __DIR__. "/../../autoload/autoload.php";

   if(isset($_GET['page'])){
      $p=$_GET['page'];
   }
   else {
    $p=1;
   }
  // chọn tất cả trong bảng admin
   $sql = "SELECT transaction.* , users.name as nameuser , users.phone as phoneuser FROM transaction LEFT JOIN users ON users.id = transaction.users_id ORDER BY ID DESC " ; // sắp xếp giảm dần
   $transaction = $db->fetchJone('transaction',$sql,$p,10,true);
   if(isset($transaction['page'])){
    $sotrang = $transaction['page'];
    unset($transaction['page']);
   }
?>

?>

<?php
 require_once __DIR__. "/../../layouts/header.php"; //gọi đến file header.php


?>
  <!-- Page Heading Nội dung  -->
 <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
          Danh sách đơn hàng
		
         </h1>
        <ol class="breadcrumb">
           <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
           <li class="active">
            <i class="fa fa-file"></i> Danh mục
           </li>
        </ol> 

        <div class="clearfix"></div> 
        <!-- thông báo lỗi -->
          <?php
			 require_once __DIR__. "/../../../partials/notification.php"; //gọi đến file notification.php
			?>           
    </div>
 </div>
<div class="row">
  <div class="col-md-12">
  	<div class="table-responsive">
    <table class="table table-bordered table-hover">
        
	<!-- hiển thị bảng danh sách danh mục -->
        <thead>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           <?php $stt=1; foreach ($transaction as $item): ?>
           	<tr>
                <td><?php echo $stt ?></td>
                <td><?php echo $item['nameuser'] ?></td>
                <td><?php echo $item['phoneuser'] ?></td>
                <td>
                  
                  <a href="status.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['status'] == 0 ? 'btn-danger' : 'btn-info'  ?>"><?php echo $item['status'] == 0 ? 'Chưa xử lý' : 'Đã xử lý' ?></a>
                </td>

                
                
                <td>
					         
					         <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i>Xóa</a>
                </td>
            </tr>
           <?php $stt++; endforeach ?>
        </tbody>

    </table>

<div class="pull-right">
 <nav aria-label="Page navigation">
  <ul class="pagination">
  	<li>
  		<a href="#" aria-label="Previous" >
  			<span aria-hidden="true">&laquo;</span>
  		</a>
  	</li>

    

    <?php for( $i=1 ; $i <= $sotrang ; $i++): ?>
      <?php 
        if(isset($_GET['page'])){
          $p= $_GET['page'];
        }
        else {
          $p=1;
        } 
      ?>
      <li class="<?php echo ($i==$p) ? 'active' : '' ?>">
        <a href="?page=<?php echo $i ;?>"><?php echo $i; ?></a>
      </li>
    <?php endfor; ?>
  

    <li>
  		<a href="#" aria-label="Next" >
  			<span aria-hidden="true">&raquo;</span>
  		</a>
  	</li>
  </ul>
</nav>
</div>
	</div>
  </div>
</div>
  <!-- /.row -->

<?php
require_once __DIR__. "/../../layouts/footer.php";
?>
product