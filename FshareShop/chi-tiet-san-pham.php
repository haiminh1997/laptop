<?php 
 // Gọi đến file autoload bên ngoài admin
    require_once __DIR__. "/autoload/autoload.php"; // Ctrl+Shift+P
    $id = intval(getInput('id'));  //lấy id


    // chi tiết sp
    $product = $db->fetchID("product",$id); //hàm fetchID lấy trong database.php
  
?>

<?php 
    require_once __DIR__. "/layouts/header.php"; // Ctrl+Shift+P

    

     // LẤY danh mục sp

    $cateid = intval( $product['category_id']); // lấy id danh mục sp

    $sql = "SELECT * FROM product WHERE category_id = $cateid ORDER BY ID DESC LIMIT 4";
    $sanphamkemtheo = $db->fetchsql($sql);


?>


    <div class="col-md-9 bor">
        <section class="box-main1" >
            <div class="col-md-6 text-center">
                <img src="<?php echo uploads() ?>product/<?php echo $product['thunbar'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">
                                
                <ul class="text-center bor clearfix" id="imgdetail">
                    <li>
                        <img src="<?php echo base_url() ?>public/frontend/images/a.jpg" class="img-responsive pull-left" width="80" height="80">
                    </li>
                    <li>
                        <img src="<?php echo base_url() ?>public/frontend/images/b.jpg" class="img-responsive pull-left" width="80" height="80">
                    </li>
                    <li>
                        <img src="<?php echo base_url() ?>public/frontend/images/c.jpg" class="img-responsive pull-left" width="80" height="80">
                    </li>
                    <li>
                        <img src="<?php echo base_url() ?>public/frontend/images/d.jpg" class="img-responsive pull-left" width="80" height="80">
                    </li>
                                   
                </ul>
            </div>
            <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
                <ul id="right">
                    <li><h3> <?php echo $product['name']?> </h3></li>

                    <?php if ($product['sale'] > 0 ): ?>
                    	<li><p><strike class="sale"><?php echo formatPrice($product['price']) ?>	</strike> <b class="price"><?php echo formatpricesale($product['price'],$product['sale']) ?></b></li>
                    <?php else : ?>
						<li><p><b><?php echo formatPrice($product['price']) ?></b></li>
                    <?php endif ?>
                    
                    <li><a href="addcart.php?id=<?php echo $item['id'] ?>" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Thêm vào giỏ hàng</a></li>
                </ul>
            </div>

        </section>
        <div class="col-md-12" id="tabdetail">
            <div class="row">
                                    
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm </a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <h3>Thông số sản phẩm</h3>
                        <p><?php echo $product['content'] ?></p>
                    </div>
                </div>
            </div>
        </div>

		<div class="col-md-12">
			<h3>Có thể bạn quan tâm !!! </h3>
			<div class="showitem" style="margin-top: 10px; margin-bottom: 10px;">
                <?php foreach ($sanphamkemtheo as $item): ?>
                  <div class="col-md-3 item-product bor">
                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                       <!--  Gọi đến trang,truyền vào id của sp -->
                         <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                    </a>
                    <div class="info-item">
                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                        <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> <b class="price"><?php echo formatpricesale($item['price'], $item['sale']) ?></b></p>
                    </div>
                    <div class="hidenitem">
                        <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                        <p><a href=""><i class="fa fa-heart"></i></a></p>
                         <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                    </div>
                  </div>
                <?php endforeach ?>
                
                                
            </div>
		</div>
    </div>


<?php 
    require_once __DIR__. "/layouts/footer.php"; // Ctrl+Shift+P
?>
               

      