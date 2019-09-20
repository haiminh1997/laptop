<?php 
  $open="category";
    require_once __DIR__. "/../../autoload/autoload.php";
    
  if ($_SERVER["REQUEST_METHOD"] == "POST") // Nếu tồn tại phương thức POST
    {
      $data =                          //tạo 1 mảng data(gioog phần insert trong database)
      [
        "name" => postInput('name'),     // gán giá trị cho biến name lấy trong phương thức                             postInput  ở file chung Function
        "slug" => to_slug(postInput("name")) // chuyển đổi tên

      ];

      $error = [];
  if (postInput('name')== ''){ // nếu trong ô nhập k có dữ liệu và gửi đi thì thông báo ra màn hình biến $error báo lỗi,phương thức kiểm tra ở dòng 54
        $error['name']="Mời bạn nhập đầy đủ tên danh mục";
      }
    // Nếu $error trống tức là k có lỗi nào thì ta tiếp tục insert vào (trong hàm insert có 2 giá trị là bảng và data)
      



  if (empty($error)){
        // kiểm tra xem tên này có tồn tại trong csdl hay k
    $isset= $db->fetchOne("category"," name= '".$data['name']."' ");
    if (count($isset) > 0){
          $_SESSION['error'] = "Tên danh mục đã tồn tại";
    }
    else {
      $id_insert = $db->insert("category",$data);  // xử lý trong hàm insert trong database. từ database ta sẽ trỏ đến bảng category
       if($id_insert > 0){ // thêm thành công

          $_SESSION['success']= "Thêm mới thành công";
          redirectAdmin("category");  // redirectAdmin trong phần Function ,trả về trang chủ có danh mục các sản phẩm và thông báo
        }
        else {
          // thêm thất bại
           $_SESSION['error']= "Thêm mới thất bại";
          
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
            <input type="text" class="form-control" id="inputEmail3" placeholder="Tên danh mục" name="name">

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
        