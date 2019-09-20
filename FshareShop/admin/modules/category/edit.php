<?php 
  $open="category";
    require_once __DIR__. "/../../autoload/autoload.php";
    /**
    * Kiểm tra id xem có tồn tại k để sửa
    */

    $id= intval(getInput('id'));
    

    $EditCategory = $db->fetchID("category",$id);
    if(empty($EditCategory)){ // nếu k tồn tại 
      $_SESSION['error']= "Dữ liệu không tồn tại";
      redirectAdmin("category");
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $data =
      [
        "name" => postInput('name'),
        "slug" => to_slug(postInput("name"))
      ];

      $error = [];
      if (postInput('name')== ''){
        $error['name']="Mời bạn nhập đầy đủ tên danh mục";
      }
    // Nếu $error trống tức là k có lỗi nào thì ta tiếp tục insert vào (trong hàm insert có 2 giá trị là bảng và data)
      if (empty($error)){
         if(EditCategory['name'] != $data['name']){
          $isset= $db->fetchOne("category"," name= '".$data['name']."' ");
            if (count($isset) > 0){
                $_SESSION['error'] = "Tên danh mục đã tồn tại";
            }
            else {
              $id_update = $db->update("category",$data,array("id"=>$id));
               if($id_update > 0){
                   // thêm thành công
                  $_SESSION['success']= "Cập nhật thành công";
                  redirectAdmin("category");
                }
              else {
                // thêm thất bại
                  $_SESSION['error']= "Dữ liệu không thay đổi";
                  redirectAdmin("category");
        }
      }
         }
         else {
          $id_update = $db->update("category",$data,array("id"=>$id));  // xử lý trong hàm update trong database. từ database ta sẽ trỏ đến bảng category
               if($id_update > 0){ // thêm thành công

                  $_SESSION['success']= "Cập nhật thành công";
                  redirectAdmin("category");  // redirectAdmin trong phần Function ,trả về trang chủ có danh mục các sản phẩm và thông báo
                }
              else {
                // thêm thất bại
                  $_SESSION['error']= "Dữ liệu không thay đổi";
                  redirectAdmin("category");
        }
         }
      }
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
                              Thêm mới danh mục
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                </li>
                                <li>
                                    <i></i>  <a href="">Danh mục</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Thêm mới
                                </li>

                            </ol>
                             <div class="clearfix"></div>
                           <?php
                                require_once __DIR__. "/../../../partials/notification.php"; //gọi đến file notification.php
                              ?>
                             
                        </div>
                    </div>
  <!-- /.row -->
<div class="row">
  <div class="col-md-12">
   
    <form class="form-horizontal" action="" method="POST">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Tên danh mục</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Tên danh mục" name="name" value="<?php echo $EditCategory['name'] ?>">

          <!-- Kiểm tra nếu tồn tại biến $error tức là k nhập gì thì ta in ra dòng chữ trong biến $error(dòng 12) yêu cầu nhâp đầy đủ -->
                <?php if (isset($error['name'])): ?>
                   <p class="text-danger">  <?php echo $error['name'] ?> </p>
                <?php endif ?>

        </div>
      </div>
      
    
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Lưu</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php
require_once __DIR__. "/../../layouts/footer.php";
?>
        