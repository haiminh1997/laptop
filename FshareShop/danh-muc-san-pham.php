<?php 
 // Gọi đến file autoload bên ngoài admin
    require_once __DIR__. "/autoload/autoload.php"; // Ctrl+Shift+P


    $id = intval(getInput('id'));  //lấy id
    $EditCategory = $db->fetchID("category",$id); //hàm fetchID lấy trong database.php

    if(isset($_GET['p'])){
    	$p = $_GET['p'];
    }
    else {
    	$p=1;
    }
    $sql = "SELECT * FROM product WHERE category_id = $id "; // lấy hết sp trong danh mục có id kia

    $total = count($db-> fetchsql($sql)); // tính tổng số bản ghi
    $product = $db->fetchJones("product",$sql,$total,$p,3,true); // lấy 9 sp trên 1 trang
    $sotrang= $product['page'];
    unset($product['page']);
 	
 	$path = $_SERVER['SCRIPT_NAME']; // lấy tên cua sever name http://localhost:8080/laptop/FshareShop
?>

<?php 
    require_once __DIR__. "/layouts/header.php"; // Ctrl+Shift+P
?>


<div class="col-md-9 bor">
                       
   <section class="box-main1">
        <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> <?php echo $EditCategory['name'] ?> </a> </h3>
    	<div class="showitem clearfix">

    		<?php foreach ($product as $item): ?>
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
       <!--  phân trang -->
            <nav class="text-center">
            	<ul class="pagination">
            	<?php for ($i=1; $i <= $sotrang ; $i++) :?> 
            		  <li class="<?php echo isset($_GET['p']) && $_GET['p'] == $i ? 'active' : '' ?>"><a href="<?php echo $path ?>?id=<?php echo $id ?>&&p=<?php echo $i ?>"><?php echo $i; ?></a></li>
            	 <?php endfor; ?>
                  
                    
                </ul>
            </nav>
           
                             
            
    </section>
</div>


<?php 
    require_once __DIR__. "/layouts/footer.php"; // Ctrl+Shift+P
?>
               

      