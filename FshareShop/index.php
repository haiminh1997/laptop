<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FShareShop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Import Bootstrap CSS ,js ,font awesome here -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://use.fontawesome.com/releases/v5.0.4/css/all.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
 </head>
 <style type="text/css" media="screen">
     * {box-sizing: border-box;}
    body {font-family: Verdana, sans-serif;}
    .mySlides {display: none;}
    img {vertical-align: middle;}

    /* Slideshow container */
    .slideshow-container {
        /* max-width: 1000px; */
        position: relative;
        margin: auto;
    }

    /* The dots/bullets/indicators */
    .dot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
    }

    @keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .text {font-size: 11px}
    }
 </style>
<body>



<?php 
 // Gọi đến file autoload bên ngoài admin
    require_once __DIR__. "/autoload/autoload.php"; // Ctrl+Shift+P

    /**
    * Đưa danh mục ra trang chủ
    */
    $sqlHomecate = "SELECT name , id FROM category WHERE home = 1 ORDER BY updated_at ";
    $CategoryHome = $db-> fetchsql($sqlHomecate);  


 // Tạo mảng 2 chiều hiển thị sản phẩm trong từng danh mục
    $data= [];

    foreach ($CategoryHome as $item) {
        $cateId = intval($item['id']);

        $sql = " SELECT * FROM product WHERE  category_id = $cateId ";
        $ProductHome = $db-> fetchsql($sql);
        $data[$item['name']] = $ProductHome;
    }
    

?>

<?php 
    require_once __DIR__. "/layouts/header.php"; // Ctrl+Shift+P
?>

<div class="col-md-9 bor">
    
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="<?php echo base_url() ?>public/frontend/images/banner1.jpg" style="width:100%">
        </div>
    <div class="mySlides fade">
        <img src="<?php echo base_url() ?>public/frontend/images/banner4.jpg" style="width:100%">
    </div>
    <div class="mySlides fade">
        <img src="<?php echo base_url() ?>public/frontend/images/banner3.jpg" style="width:100%">
    </div>
    </div>
    <br>
    <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
    </div>
    <section class="box-main1">
        <?php foreach ($data as $key => $value): ?>
            <h3 class="title-main"><a href=""><?php echo $key ?> </a> </h3>
            <div class="showitem" style="margin-top: 10px; margin-bottom: 10px;">
                <?php foreach ($value as $item): ?>
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
                         <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                    </div>
                  </div>
                <?php endforeach ?>                
            </div>
        <?php endforeach ?>   
    </section>
    </div>


<?php 
    require_once __DIR__. "/layouts/footer.php"; // Ctrl+Shift+P
?>


<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>
               

      