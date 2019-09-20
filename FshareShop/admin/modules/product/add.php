<?php 
  $open="category";
    require_once __DIR__. "/../../autoload/autoload.php";

     
    /**
    *Lấy danh sách danh mục sản phẩm
    */
    $category=$db->fetchAll("category");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") // Nếu tồn tại phương thức POST
    {
      $data =
      [
        "name"        => postInput('name'),
        "slug"        => to_slug(postInput("name")),
        "category_id" => postInput("category_id"),
        "price"       => postInput("price"),
        "number"      => postInput("number"),
        "content"     => postInput("content")



      ];
    /**
    * bắt lỗi k nhập đầy đủ thông tin sản phẩm
    */
      $error = [];
      if (postInput('name')== ''){ // nếu trong ô nhập k có dữ liệu và gửi đi thì thông báo ra màn hình biến $error báo lỗi,phương thức kiểm tra ở dòng 54
        $error['name']="Mời bạn nhập đầy đủ tên danh mục";
      }

       if (postInput('category_id')== ''){ 
        $error['category_id']="Mời bạn chon tên danh mục";
      }

      if (postInput('price')== ''){ 
        $error['price']="Mời bạn nhập giá sản phẩm";
      }

      if (postInput('content')== ''){ 
        $error['content']="Mời bạn nhập nội dung sản phẩm";
      }
      if (postInput('number')== ''){ 
        $error['number']="Mời bạn nhập số lượng sản phẩm";
      }

      if(! isset($_FILES['thunbar'])){
         $error['thunbar']="Mời bạn chọn hình ảnh sản phẩm";
      }



    // Nếu $error trống tức là k có lỗi nào thì ta tiếp tục insert vào (trong hàm insert có 2 giá trị là bảng và data)
      if (empty($error)){ // lưu ảnh vào trong phần upload
        
        if(isset($_FILES['thunbar'])){
          $file_name = $_FILES['thunbar']['name'];
          $file_tmp = $_FILES['thunbar']['tmp_name'];
          $file_type = $_FILES['thunbar']['type'];
          $file_erro = $_FILES['thunbar']['error'];

          if($file_erro == 0) {
              $part= ROOT ."product/";  //trỏ tới đường dẫn ảnh trong product,ROOT đc định nghĩa ở trong autoload
              $data['thunbar']= $file_name;
          }
        } 

        // thêm sp vào csdl
       $id_insert = $db-> insert("product",$data);
       if($id_insert){ //  nếu tồn tại
          move_uploaded_file($file_tmp,$part.$file_name);
          $_SESSION['success']=" Thêm mới thành công";
          redirectAdmin("product");
       }
       else {
        $_SESSION['error']=" Thêm mới thất bại";
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
                              Thêm mới sản phẩm
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                </li>
                                <li>
                                    <i></i>  <a href="">Sản phẩm</a>
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
   
    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Danh mục sản phẩm</label>
        <div class="col-sm-8">
           <select class="form-control col-md-8" name="category_id">
             <option value="">-Mời bạn chọn danh mục sản phẩm-</option>
             <?php foreach ($category as $item): ?>
               <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>}
            
             <?php endforeach ?>
           </select>
                <?php if (isset($error['category_id'])): ?>
                   <p class="text-danger">  <?php echo $error['category_id'] ?> </p>
                <?php endif ?>

        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Tên danh mục" name="name">

          <!-- Kiểm tra nếu tồn tại biến $error tức là k nhập gì thì ta in ra dòng chữ trong biến $error(dòng 12) yêu cầu nhâp đầy đủ -->
                <?php if (isset($error['name'])): ?>
                   <p class="text-danger">  <?php echo $error['name'] ?> </p>
                <?php endif ?>

        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Giá sản phẩm</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="inputEmail3" placeholder="9.000.000" name="price">
                <?php if (isset($error['price'])): ?>
                   <p class="text-danger">  <?php echo $error['price'] ?> </p>
                <?php endif ?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Số lượng sản phẩm</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="inputEmail3" placeholder="100" name="number">
                <?php if (isset($error['number'])): ?>
                   <p class="text-danger">  <?php echo $error['number'] ?> </p>
                <?php endif ?>
        </div>
      </div>



      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Giảm giá</label>
        <div class="col-sm-3">
            <input type="number" class="form-control" id="inputEmail3" placeholder="10%" name="sale" value="0">
        </div>
        <label for="inputEmail3" class="col-sm-1 control-label">Hình ảnh</label>
        <div class="col-sm-3">
            <input type="file" class="form-control" id="inputEmail3"  name="thunbar" >
            <?php if (isset($error['thunbar'])): ?>
                   <p class="text-danger">  <?php echo $error['thunbar'] ?> </p>
                <?php endif ?>
        </div>
      </div>


       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Nội dung</label>
        <div class="col-sm-8">
            <textarea  id="content" class="form-control" name="content" rows="4"></textarea>
                <?php if (isset($error['content'])): ?>
                   <p class="text-danger">  <?php echo $error['content'] ?> </p>
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
          