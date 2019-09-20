<?php 
	require_once __DIR__. "/autoload/autoload.php"; // Ctrl+Shift+P
    if(!isset($_SESSION['name_id'])){ // nếu k tồn tại name_id
    	echo "<script>alert('Bạn phải đăng nhập mới mua được hàng .'); location.href='index.php'</script>";
    }

     $id = intval(getInput('id'));  //lấy id


    // chi tiết sp
    $product = $db->fetchID("product",$id); 


    // kiểm tra nếu tồn tại giỏ hàng thfi cập nhật giỏ hàng
    //
    // ngược lại thì tạo mới

    if(! isset($_SESSION['cart'][$id])){
    	//tạo mới giỏ hàng
    	$_SESSION['cart'][$id]['name'] = $product['name'];
    	$_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
    	// $_SESSION['cart'][$id]['price'] = $product['price'];
    	$_SESSION['cart'][$id]['qty'] = 1; // do chưa có sp nên số lượng =1
		$_SESSION['cart'][$id]['price'] = ((100 - $product['sale']) * $product['price']) / 100;

    	


    }
    else {
    	//cập nhật giỏ hàng
    	$_SESSION['cart'][$id]['qty'] += 1;

    }
    echo "<script>alert('Thêm sản phẩm thành công');location.href='gio-hang.php'</script>"


?>