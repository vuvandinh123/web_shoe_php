<?php

use App\Models\Menu;

$args_mainmenu = [
        ['parent_id', '=', '0'],
        ['status', '=', '1'],
        ['position', '=', 'footermenu']
];
$lis_menu = Menu::where($args_mainmenu)->orderBy('sort_order', 'asc')->get();

?>
<div class="container">
<hr class='my-3'>
      <div class="my-3">
        <div class="row">
          <div class="col py-4 animationTop ">
            <div class="row">
              <div class="col-3 ">
                <img src="https://bizweb.dktcdn.net/100/342/645/themes/701397/assets/srv_1.png?1677377108874" alt="">
              </div>
              <div class="col">
                <p class="p-0 m-0  fw-bold fs-3">Miễn phí vận chuyển</p>
                <span class="fs-5 text-secondary">Miễn phí vận chuyển nội thành</span>
              </div>
            </div>
          </div>
          <div class="col py-4 animationTop ">
            <div class="row">
              <div class="col-3 ">
                <img src="https://bizweb.dktcdn.net/100/342/645/themes/701397/assets/srv_2.png?1677377108874" alt="">
              </div>
              <div class="col">
                <p class="p-0 m-0  fw-bold fs-3">Đổi trả hàng</p>
                <span class="fs-5 text-secondary">Đổi trả lên tới 30 ngày</span>
              </div>
            </div>
          </div>
          <div class="col py-4 animationTop ">
            <div class="row">
              <div class="col-3 ">
                <img src="https://bizweb.dktcdn.net/100/342/645/themes/701397/assets/srv_3.png?1677377108874" alt="">
              </div>
              <div class="col">
                <p class="p-0 m-0  fw-bold fs-3">Tiết kiệm thời gian</p>
                <span class="fs-5 text-secondary">Mua sắm dễ hơn khi online</span>
              </div>
            </div>
          </div>
          <div class="col py-4 animationTop ">
            <div class="row">
              <div class="col-3 ">
                <img src="https://bizweb.dktcdn.net/100/342/645/themes/701397/assets/srv_4.png?1677377108874" alt="">
              </div>
              <div class="col">
                <p class="p-0 m-0  fw-bold fs-3">Tư vấn trực tiếp</p>
                <span class="fs-5 text-secondary">Đội ngũ tư vấn nhiệt tình</span>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

<footer>
    <div class="footer-top">
        <div class="container">
            <h6 class="fs-1 text-center">
                NHẬP MAIL
            </h6>
            <p class="text-center">Để nhận tin tức khuyến mãi từ cửa hàng của chúng tôi</p>
            <form action="">
                <div class="input-group mb-3 input-footer">
                    <input type="text" class="form-control " placeholder="Nhập email của bạn"
                        aria-label="Nhập email của bạn" aria-describedby="basic-addon2">
                    <button class="btn btn-outline-secondary bg-danger text-white" type="button" id="button-addon2">GỬI
                        NGAY</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container p-5">
        <div class="row">
            <div class="col-md col-6">
                <h6 class="fs-2 fw-bold mb-3">Hệ thống của hàng</h6>
                <p class=" fs-4 fw-bold">Sea Shoes Hồ Chí Minh</p>
                <p class=" fs-4 text-secondary">Địa chỉ: 366 Đội Cấn Ba Đình Hồ Chí Minh</p>
                <p class=" fs-4 text-secondary">Hotline: 0333583800</p>
                <p class=" fs-4 fw-bold">Sea Shoes Hồ Chí Minh</p>
                <p class=" fs-4 text-secondary">Địa chỉ: 366 Đội Cấn Ba Đình Hồ Chí Minh</p>
                <p class=" fs-4 text-secondary">Hotline: 0333583800</p>
            </div>
            <?php foreach($lis_menu as $value):?>
                <?php 
                    $args_mainmenu2 = [
                        ['parent_id', '=', $value->id],
                        ['status', '=', '1'],
                        ['position', '=', 'footermenu']
                ];
                $lis_menu2 = Menu::where($args_mainmenu2)->orderBy('sort_order', 'asc')->get();
                    
                    ?>
            <div class="col-md">
                
                <ul><h6 class="fs-3  mb-4"><?=$value->name?></h6>
                    <?php foreach ($lis_menu2 as $value2):?>
                     <li class='mb-4 text-secondary fs-4'><a class="a-hover link-hover" href="<?=$value2->link?>"><?=$value2->name?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <?php endforeach;?>
            <div class="col-md col-6">
                <h6 class="fs-3 ms-4 mb-4">Đăng ký</h6>
                <div class="icon-img-footer">
                    <img src="https://bizweb.dktcdn.net/100/369/492/themes/799053/assets/bocongthuong.png?1664335617141"
                        alt="">
                </div>
                <h6 class="fs-3 ms-4 my-4 ">Thanh toán</h6>

                <div class="icon-img-footer ms-4">
                    <img src="https://bizweb.dktcdn.net/100/369/492/themes/799053/assets/payment.png?1664335617141"
                        alt="">
                </div>


            </div>
        </div>
    </div>
    <div class="footer-bot bg-dark">
        <h4 class="text-white">
            © Bản quyền thuộc về <span class="text-danger"> Định</span> | Cung cấp bởi Định
        </h4>
    </div>
    <!-- <div class="button" id="success-btn">success</div>
    <div class="button" id="error-btn">error</div>
    <div class="button" id="info-btn">info</div>
    <div class="button" id="warning-btn">warning</div> -->
</footer>
<div class="backto-top" onclick="backToTop()">
    <a class="text-white" ><i class="fa-solid fa-chevron-up fa-2xl fs-3 fw-bold"></i></a>
</div>
</body>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script
      type="text/javascript"
      src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    

    <script>
      $(".details-image-items").slick({
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        lazyLoad: 'ondemand',
        slidesToScroll: 4,
        centerPadding: '60px',
      });
    </script>
<script src="public/js/index.js"></script>
<script src="public/js/news.js"></script>
<script src="public/js/toasts.js"></script>
<script src="public/js/validate.js"></script>
<!-- <script src="public/js/cart.js"></script> -->


<?php if(isset($_SESSION['success'])): ?>
  <script>
    	toasts.showSuccess('This is a success message!');
  </script>
  <?php unset($_SESSION['success']); ?> 
<?php endif; ?>