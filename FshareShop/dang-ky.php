<?php 
 // Gọi đến file autoload bên ngoài admin
    require_once __DIR__. "/autoload/autoload.php"; // Ctrl+Shift+P
    if(isset($_SESSION['name_id'])){ // nếu đã có tk thì k vào đc trang đăng ký
    	echo "<script>alert('Bạn đã có tài khoản'); location.href='index.php'</script>";
    }

  // kết nối dtb
    // $conn = mysqli_connect("localhost","root","","fshareshop");
    // mysqli_set_charset($conn,"utf8"); 
   
 // xử lý
    // $name=$email=$password=$address=$phone=''; // khởi tạo các biến trống
    $data = 
    [
    	'name' 		=> postInput("name"),
    	'email'		=> postInput("email"),
    	'password' 	=> (postInput("password")),
    	'address'  	=> postInput("address"),
    	'phone'  	=> postInput("phone")
    ];
    $error = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	// tiến hành validete và đăng ký

    	// xử lý name
    	
    	if($data['name'] == ''){
    		$error['name'] = "Tên không được để trống";
    	}


    	//xử lý email
    	
   
    	if($data['email'] == ''){
    		$error['email'] = "Email không được để trống";
    	}
    	else {
    		$is_check= $db->fetchOne("users"," email ='".$data['email']."'");
    	}
    	if($is_check != NULL) {
    		$error['email'] ="Emai đã tồn tại. Hãy nhập email khác!!!";
    	}

    	//xử lý phone
    	
    	if($data['phone'] == ''){
    		$error['phone'] = "Sdt không được để trống";
    	}


    	//xử lý password
    	
    	if($data['password'] == ''){
    		$error['password'] = "password không được để trống";
    	}
    	else {
    		$data['password'] = MD5(postInput("password"));
    	}
    	

    	//xử lý address
    	
    	if($data['address'] == ''){
    		$error['address'] = "Địa chỉ không được để trống";
    	}


    	// kiểm tra mảng error
    	if(empty($error)){
    		//insert
    		$idinsert = $db-> insert("users",$data);
    		if($idinsert > 0){
    			$_SESSION['success'] = "Đăng ký thành công. Mời bạn đăng nhập !!!";
    			header("location: dang-nhap.php");
    		}
    		else {
    			echo "Đăng ký thất bại";
    		}
    		
    	}
    }
    

?>

<?php 
    require_once __DIR__. "/layouts/header.php"; // Ctrl+Shift+P
?>

<div class="col-md-9 bor">
    <section class="box-main1">
        <h3 class="title-main"><a href=""> Đăng ký thành viên </a> </h3>
	<form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">
	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1"> Tên thành viên</label>
			<div class="col-md-8">
				<input type="text" name="name" placeholder="Khá Bảnh" class="form-control" value="<?php echo $data['name'] ?>">

				<?php if (isset($error['name'])): ?>
					<p class="text-danger"><?php echo $error['name'] ?></p>
				<?php endif ?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-2 col-md-offset-1"> Email</label>
			<div class="col-md-8">
				<input type="email" name="email" placeholder="khabanh@gmail.com" class="form-control" value="<?php echo $data['email'] ?>">
				<?php if (isset($error['email'])): ?>
					<p class="text-danger"><?php echo $error['email'] ?></p>
				<?php endif ?>
			</div>
		</div>


		<div class="form-group">
			<label class="col-md-2 col-md-offset-1"> Mật khẩu</label>
			<div class="col-md-8">
				<input type="password" name="password" placeholder="*******" class="form-control" value="<?php echo $data['password'] ?>" >
				<?php if (isset($error['password'])): ?>
					<p class="text-danger"><?php echo $error['password'] ?></p>
				<?php endif ?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-2 col-md-offset-1"> Số điện thoại</label>
			<div class="col-md-8">
				<input type="number" name="phone" placeholder="0123456789" class="form-control" value="<?php echo $data['phone'] ?>">
				<?php if (isset($error['phone'])): ?>
					<p class="text-danger"><?php echo $error['phone'] ?></p>
				<?php endif ?>
			</div>
		</div>


		<div class="form-group">
			<label class="col-md-2 col-md-offset-1"> Địa chỉ</label>
			<div class="col-md-8">
				<input type="text" name="address" placeholder="Quất Lâm Nam Định" class="form-control" value="<?php echo $data['address'] ?>">
				<?php if (isset($error['address'])): ?>
					<p class="text-danger"><?php echo $error['address'] ?></p>
				<?php endif ?>
			</div>
		</div>
		<button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px">Đăng ký</button>
	</form>
    </section>
</div>


<?php 
    require_once __DIR__. "/layouts/footer.php"; // Ctrl+Shift+P
?>
               

      