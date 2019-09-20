<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thanh toán đơn hàng FShareShop</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Import Bootstrap CSS ,js ,font awesome here -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="http://use.fontawesome.com/releases/v5.0.4/css/all.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
 </head>
<body>


<?php 
 // Gọi đến file autoload bên ngoài admin
    require_once __DIR__. "/autoload/autoload.php"; // Ctrl+Shift+P
    $user = $db->fetchID("users",intval($_SESSION['name_id']));
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

    	$email = $_POST['gmail'];
	require 'PHPMailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;

	$mail->isSMTP();                                   // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                            // Enable SMTP authentication
	$mail->Username = 'haiminh97lqd@gmail.com';      // SMTP username
	$mail->Password = 'luonghaiminh1997'; 					// SMTP password
	$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                 // TCP port to connect to

	$mail->addAddress($user['email']);   // Add a recipient


	$mail->isHTML(true);  // Set email format to HTML

	$bodyContent .= "<p>Bạn nhận được thông báo xác nhận đơn hàng từ <b>FShareShop</b></p>";
	  // $bodyContent .= "<p>Tên KH: $user['name']</p> ";

	$mail->Subject = 'Email From FShareShop';
	$mail->Body    = $bodyContent;

	if(!$mail->send()) {
    	echo 'Gửi mail lỗi';
    	echo 'Mailer Error: ' . $mail->ErrorInfo;
	} 
	else {
    	echo 'Bạn sẽ nhận đc thông báo khi có vấn đề phát sinh';
	}


	
    $data =
    	[
    	 	'amount' => $_SESSION['total'],
    	 	'users_id' => $_SESSION['name_id'],
    	 	'note' => postInput("note")

    	];
    $idtran = $db->insert("transaction",$data); // thêm dữ liệu từ mảng data vào transaction
    if($idtran > 0){
    	foreach($_SESSION['cart'] as $key=> $value){ // lấy chi tiết đơn hàng
    		$data2 = 
    		[
    			'transaction_id'  => $idtran,
    			'product_id'      => $key,
    			'qty'             => $value['qty'],
    			'price'           => $value['price']
    		];
    		$id_insert = $db->insert("orders",$data2);
    	}
    	
    	$_SESSION['success'] = "Lưu thông tin đơn hàng thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất!";
    	header("location: thong-bao.php");
    }
    }
?>

<?php 
    require_once __DIR__. "/layouts/header.php"; // Ctrl+Shift+P
?>


<div class="col-md-9 bor">
	<section class="box-main1">
      	<h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> Thanh toán đơn hàng</a> </h3>
      <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">
	
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1"> Tên thành viên</label>
			<div class="col-md-8">
				<input type="text" readonly="" name="name" placeholder="Khá Bảnh" class="form-control" value="<?php echo $user['name'] ?>">

				
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-2 col-md-offset-1"> Email</label>
			<div class="col-md-8">
				<input type="email" readonly="" name="email" placeholder="khabanh@gmail.com" class="form-control" value="<?php echo $user['email'] ?>">
				
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-2 col-md-offset-1"> Số điện thoại</label>
			<div class="col-md-8">
				<input type="number" readonly="" name="phone" placeholder="0123456789" class="form-control" value="<?php echo $user['phone'] ?>">
				
			</div>
		</div>


		<div class="form-group">
			<label class="col-md-2 col-md-offset-1"> Địa chỉ</label>
			<div class="col-md-8">
				<input type="text" readonly="" name="address" placeholder="Quất Lâm Nam Định" class="form-control" value="<?php echo $user['address'] ?>">
				
			</div>
		</div>


		<div class="form-group">
			<label class="col-md-2 col-md-offset-1"> Số tiền</label>
			<div class="col-md-8">
				<input type="text" readonly="" name="address" placeholder="Quất Lâm Nam Định" class="form-control" value="<?php echo formatPrice($_SESSION['total']) ?>">
				
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-2 col-md-offset-1"> Ghi chú</label>
			<div class="col-md-8">
				<input type="text" name="note" placeholder="Khách chỉ đặt hàng cho vui thôi !!" class="form-control" value="">
				
			</div>
		</div>
		<button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px">Xác nhận</button>
	</form>

    
    </section>
</div>


<?php 
    require_once __DIR__. "/layouts/footer.php"; // Ctrl+Shift+P
?>
</body>
</html>
               

      