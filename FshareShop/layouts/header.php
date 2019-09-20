
<!DOCTYPE html>
<html>
    <head>
        <title>FshareShop</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">
        
        <script  src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
        <style>
            .dropbtn {
                background-color: #444;
                color: white;
                padding-top: 12px;
                padding-left: 10px;
                padding-right: 10px;
                padding-bottom: 10px;
                font-size: 12px;
                border: none;
                font-weight: bold;
                text-transform: uppercase;
            }

            .dropdown {
                position: relative;
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f1f1f1;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content a:hover {background-color: #ea3a3c;}

            .dropdown:hover .dropdown-content {display: block;}

            .dropdown:hover .dropbtn {background-color: #666;}
        </style>
    </head>
    <body>
        <div id="wrapper">
            <!---->
            <!--HEADER-->
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                <img src="logo.png" alt="logo"><b>Chất lượng đặt lên hàng đầu </b>
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        <?php if (isset($_SESSION['name_user'])): ?>
                                            <li style="color: red">Xin chào :<?php echo $_SESSION['name_user'] ?> </li>
                                            <li>
                                                <a href=""><i class="fa fa-user"></i> Tài khoản <i class="fa fa-caret-down"></i></a>
                                            <ul id="header-submenu">
                                                <li><a href="">Thông tin</a></li>
                                                <li><a href="gio-hang.php">Giỏ hàng</a></li>
                                                <li><a href="thoat.php"> <i class="fa fa-share-square-o"></i>Thoát</a></li>
                                            </ul>
                                            </li>
                                            
                                        <?php else : ?>
                                            <li>
                                                <a href="dang-nhap.php"><i class="fa fa-unlock"></i> Đăng nhập</a>
                                            </li>
                                            <li>
                                                <a href="dang-ky.php"><i class="fa fa-user"></i> Đăng ký</a>
                                            </li>
                                        <?php endif ; ?>
                                        
                                        
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-12" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>099696969</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HEADER-->


            <!--MENUNAV-->
            <div id="menunav">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="index.php">Trang chủ</a>
                        </div>
                        <!--menu main-->
                        <ul id="menu-main">
                            <li>
                                <div class="dropdown">
<!--                                    <a href="index.php">Trang chủ</a>-->
                                    <button class="dropbtn">Cửa hàng</button>
                                    <div class="dropdown-content">
                                        <?php foreach($category as $item) :?>
                                            <a href="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="">Giới thiệu</a>
                            </li>
                            <li>
                                <a href="">Địa chỉ</a>
                            </li>
                            <li>
                                <a href="contact.php">Liên hệ</a>
                            </li>
                            
                            
                        </ul>
                        <!-- end menu main-->

                        <!--Shopping-->
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href="gio-hang.php"><i class="fa fa-shopping-basket"></i> Giỏ hàng </a>
                            </li>
                        </ul>
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->
            
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                            <ul>
                                <?php foreach($category as $item) :?>
                                     <li><a href="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                           
                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>
                           
                            <ul>
                                <?php foreach ($productNew as $item): ?>
                                    <li class="clearfix">
                                        <a href="">
                                        <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"> <?php echo $item['name']; ?></p >
                                            <b class="price">Giảm giá:
                                                <?php
                                                    $priceSale = ($item['price'] * (100 - $item['sale'])) / 100;
                                                    echo $priceSale ;
                                                ?>
                                            </b><br>
                                            <b class="sale">Giá gốc: <?php echo $item['price']?></b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                        </a>
                                    </li>
                                <?php endforeach ?>                         
                            </ul>
                            <!-- </marquee> -->
                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm bán chạy </h3>
                      
                            <ul>
                                <?php foreach ($productPay as $item): ?>
                                    <li class="clearfix">
                                        <a href="">
                                        <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"> <?php echo $item['name']; ?></p >
                                            <b class="price">Giảm giá:
                                                <?php
                                                $priceSale = ($item['price'] * (100 - $item['sale'])) / 100;
                                                echo $priceSale ;
                                                ?>
                                            </b><br>
                                            <b class="sale">Giá gốc: <?php echo $item['price']?></b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                        </a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                            <!-- </marquee> -->
                        </div>
                    </div>