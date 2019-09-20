</div>
<div class="container">
    <div class="col-md-4 bottom-content">
        <a href=""><img src="<?php echo base_url() ?>public/frontend/images/free-shipping.png"></a>
    </div>
    <div class="col-md-4 bottom-content">
        <a href=""><img src="<?php echo base_url() ?>public/frontend/images/guaranteed.png"></a>
    </div>
    <div class="col-md-4 bottom-content">
        <a href=""><img src="<?php echo base_url() ?>public/frontend/images/deal.png"></a>
    </div>
</div>
<div class="container-pluid">
    <section id="footer">
        <div class="container">
            <div class="col-md-3" id="shareicon">
                <ul>
                    <li>
                        <a href="www.facebook.com"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="twitter.com"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="www.gmail.com"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li>
                        <a href="www.youtobe.com"><i class="fa fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8" id="title-block">
                <div class="pull-left">

                </div>
                <div class="pull-right">

                </div>
            </div>

        </div>
    </section>
    <section id="footer-button">
        <div class="container-pluid">
            <div class="container">
                <div class="col-md-3" id="ft-about">
                    <h3>Giới thiệu FSHARE SHOP</h3>
                    <p>Fshare Shop là địa chỉ uy tín được nhiều khách hàng đánh giá cao trong chất lượng dịch vụ </p>
                    <p>Fshare luôn đặt chất lượng lên hàng đầu </p>
                </div>
                <div class="col-md-3 box-footer" >
                    <h3 class="tittle-footer">FSHARE SHOP</h3>
                    <ul>
                        <li>
                            <i class="fa fa-angle-double-right"></i>
                            <a href=""><i></i> Giới thiệu</a>
                        </li>
                        <li>
                            <i class="fa fa-angle-double-right"></i>
                            <a href="contact.php"><i></i> Liên hệ </a>
                        </li>
                        <li>
                            <i class="fa fa-angle-double-right"></i>
                            <a href=""><i></i>  Đánh giá </a>
                        </li>

                    </ul>
                </div>

                <div class="col-md-3" id="footer-support">
                    <h3 class="tittle-footer"> Liên hệ</h3>
                    <ul>
                        <li>

                            <p><i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i> Học viện Công Nghệ Bưu Chính Viễn Thông Số 10 Trần Phú Hà Đông Hà Nội </p>
                            <p><i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 5px;"></i> 012345678</p>
                            <p><i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i> support@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 box-footer">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.281963705778!2d105.7852926142445!3d20.981331594773177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135accdcf7b0bd1%3A0xc1cf5dd00247628a!2zSOG7jWMgVmnhu4duIEPDtG5nIG5naOG7hyBCxrB1IENow61uaCBWaeG7hW4gVGjDtG5n!5e0!3m2!1svi!2s!4v1567682547592!5m2!1svi!2s" width="250" height="200" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </section>
    <section id="ft-bottom">
        <p class="text-center">Copyright © 2019 . Design by  PTIT !!! </p>
    </section>
</div>
</div>
</div>
</div>
</div>
<script  src="<?php echo base_url() ?>frontend/js/slick.min.js"></script>

</body>

</html>

<script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(500);
        })
    })


    $(function(){
        $updatecart = $(".updatecart"); // lấy class updatecart bên update giỏ hàng
        $updatecart.click(function(e){ // bắt sự kiện click chuột
            e.preventDefault(); // k load lại trang
            $qty = $(this).parents("tr").find(".qty").val(); // lấy số lượng hàng khi kh cập nhật,find là tìm
            $key = $(this).attr("data-key"); // lấy key của đơn hàng
            $.ajax({
                url:'cap-nhat-gio-hang.php',
                type : 'GET',
                data : {'qty':$qty,'key':$key},
                success:function(data){
                    if(data == 1){
                        alert("Cập nhật giỏ hàng thành công");
                        location.href='gio-hang.php';
                    }
                }
            });
        })

    })

</script>
