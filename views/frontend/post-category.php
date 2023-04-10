<?php require_once('views/frontend/header.php'); ?>
<?php
use App\Models\Menu;
use App\Models\Product;
$args_mainmenu = [
    ['parent_id', '=', '0'],
    ['status', '=', '1'],
    ['position', '=', 'mainmenu']
  ];
  $lis_menu = Menu::where($args_mainmenu)->orderBy('sort_order', 'asc')->get();
$list_product2 = Product::where('status', '=', 1)->orderBy('price', 'desc')->limit(6)->get();
  


?>
    <div class="container mt-5">
        <div class="breadcrumb">
            <ul class="d-flex">
                <li class="">
                    <a class="me-md-3 me-1" href="index.php">Trang chủ</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class="">
                    <a class="me-md-3 me-1" href="?option=post">Tin tức</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class="">4 Đôi giày thể thao mới ra mắt đầu tháng 6</li>
            </ul>
        </div>
        <h1 class="text-center color-red fw-bold">Tin tức</h1>
        <section class="cart my-5 p-2">
            <h2 class="fw-bold fs-3">
                4 Đôi giày thể thao mới ra mắt đầu tháng 6
            </h2>
            <ul class="crated-at d-flex color-secondary fs-5 fw-500 p-0">
                <li class="me-4 "><i class="fa-solid fa-calendar-days me-2"></i> Thứ hai, 23/3/2023</li>
                <li class=" "><i class="fa-solid fa-user me-2"></i> Đăng bởi <span>Vũ Văn Định</span></li>
            </ul>
            <div class="row">
                <div class="col-md-9">
                    <div class="article_lq my-4 mb-5">
                        <p class="text-uppercase fw-semibold fs-4 ms-3 pt-3">bài viết liên quan</p>
                        <ul>
                            <li class="my-3"><a class="link-hover " href="#">Những đôi giày diện với quần xẻ tà siêu
                                    chất</a></li>
                            <li class="my-3"><a class="link-hover " href="#">Làm sạch giày da lộn đơn giản và hiệu quả
                                    nhất</a></li>
                            <li class="my-3"><a class="link-hover " href="#">Đi du lịch nên chọn 5 kiểu giầy này sẽ giúp
                                    bạn cá tính hơn</a></li>
                            <li class="my-3"><a class="link-hover " href="#">10 đôi giày các nàng công sở nhất định phải
                                    có</a></li>
                        </ul>
                    </div>
                    <div class="content-news color-secondary fs-4">
                        <p>Nếu là bạn tín đồ cuồng giầy thể thao thì chắc sẽ không muốn bỏ qua những đôi giày mới ra đầu
                            tháng 6 này đâu!</p>
                        <p>1.Addidas LGBT Rainbow Pack</p>
                        <p>Tháng 6 cũng được xem là thời điểm đầy ý nghĩa với cộng đồng LGBT. Các hãng giầy, trong đó có
                            Addidas đã nhanh chóng đưa ra những phiên bản giày mới cho sự kiện này.</p>
                        <div class="text-center">
                            <img src="https://bizweb.dktcdn.net/thumb/large/100/342/645/files/4-doi-giay-thao-moi-ra-mat-dau-thang-6-4.jpg?v=1545574128885"
                                alt="">
                        </div>
                        <p>Đó là những thiết kế các phiên bản có màu sắc như đúng tên gọi của chúng “Rainbow Pack”. Toàn
                            bộ chúng đều được thêm thắt khéo léo màu sắc cầu vòng, là biểu tượng cho cộng đồng LGBT.
                            Được biết một phần lợi nhuận từ việc bán những thiết kế này sẽ được dành cộng đồng LGBT thể
                            thao là The Rainbow Laces.</p>
                        <p>2.Adidas x Bodega x END.Boro Demin Pack</p>
                        <p>Đây là sản phẩm từ sự hợp tác của Adidas cùng hãng bán lẻ Bodega và thương hiệu END. Mẫu giây
                            Sneaker Exchange phiên bản 2017 với điểm nhấn quen thuộc “3 sọc”, mang đến nhiều sự hoài
                            niệm về dòng giày cũ.</p>
                        <div class="text-center">
                            <img src="https://bizweb.dktcdn.net/thumb/large/100/342/645/files/4-doi-giay-thao-moi-ra-mat-dau-thang-6-9.jpg?v=1545574178346"
                                alt="">
                        </div>
                        <p>Họ đã đặt tên cho thiết kế này là Boro Denim với 2 màu chính đầy sự hoài cổ. Ước tính thì giá
                            của mỗi đôi giày sẽ khoảng 4 triệu VND.</p>
                        <p>3.Nike SF Air Force 1 Mid Neutral Olive</p>
                        <p>Sau phiên bản màu đen SF Air Force 1 Mid, hãng Nike đã tiếp tục cho ra mắt phiên bản mới màu
                            oliu. Trong phiên bản này, hãng đang trang bị thêm một lớp da cao cấp nhằm tăng tính thời
                            thượng hơn. Ngoài ra các chi tiết từ khóa kéo đến dây giày cũng đều được trau chuốt cực kì
                            tỉ mỉ.</p>
                        <p>Có thể nói thiết kế đầy tính đẳng cấp và bóng bẩy của hãng sẽ khiến các fan ruột phải phát
                            cuống khi mẫu giầy này ra mắt.</p>
                    </div>
                    <h5 class="fs-2 fw-bold my-3 mt-5">Bình luận: </h5>
                    <div class="comment mb-5 border  p-3">
                        <div class="comment-user my-4">
                            <div class="comment-user-item">
                                <div class="user-img  "><img class="" src="https://tse2.explicit.bing.net/th?id=OIP.IZHEgMNoXV8J61xUWl7d8QHaFj&pid=Api&P=0" alt=""></div>
                                <div class="col">
                                    <h6 class="fs-3 text-capitalize">Vũ Văn Định</h6>
                                    <p class="color-secondary fs-5">12/3/2023</p>
                                    <p class="fs-5 wrap-text">bài viết rất hay và ý nghĩa Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit eum accusantium laudantium, nihil minima, ducimus magnam autem ullam hic, necessitatibus laboriosam earum iste quos vel enim? Dicta voluptate a odio?</p>
                                </div>
                            </div>
                        </div>
                        <div class="comment-user my-4">
                            <div class="comment-user-item">
                                <div class="user-img  "><img class="" src="https://tse3.mm.bing.net/th?id=OIP.727a68CzCpOMaa_iV69DOAHaJ3&pid=Api&P=0" alt=""></div>
                                <div class="col">
                                    <h6 class="fs-3 text-capitalize">Lâm nhật tân</h6>
                                    <p class="color-secondary fs-5">12/3/2023</p>
                                    <p class="fs-5 wrap-text">bài viết rất hay và ý nghĩa Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit eum accusantium laudantium, nihil minima, ducimus magnam autem ullam hic, necessitatibus laboriosam earum iste quos vel enim? Dicta voluptate a odio?</p>
                                </div>
                            </div>
                        </div>
                        <div class="comment-user my-4">
                            <div class="comment-user-item">
                                <div class="user-img  "><img class="" src="https://tse4.mm.bing.net/th?id=OIP.LUJyLO23sreztzBvQtGOcAAAAA&pid=Api&P=0" alt=""></div>
                                <div class="col">
                                    <h6 class="fs-3">Trần văn đẳng</h6>
                                    <p class="color-secondary fs-5">12/3/2023</p>
                                    <p class="wrap-text fs-5">bài viết rất hay và ý nghĩa Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit eum accusantium laudantium, nihil minima, ducimus magnam autem ullam hic, necessitatibus laboriosam earum iste quos vel enim? Dicta voluptate a odio?</p>
                                </div>
                            </div>
                        </div>
                        <div class="comment-user my-4">
                            <div class="comment-user-item">
                                <div class="user-img  "><img class="" src="https://www.dungplus.com/wp-content/uploads/2019/12/girl-xinh.jpg" alt=""></div>
                                <div class="col">
                                    <h6 class="fs-3 text-capitalize">Bùi thị Hồng Thơm</h6>
                                    <p class="color-secondary fs-5">12/3/2023</p>
                                    <p class="wrap-text">bài viết rất hay và ý nghĩa Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit eum accusantium laudantium, nihil minima, ducimus magnam autem ullam hic, necessitatibus laboriosam earum iste quos vel enim? Dicta voluptate a odio?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-commnet">
                        <h5 class="fs-2 fw-bold my-5">Để lại bình luận:</h5>
                        <form action="" method="post">
                            <div class="row">
                                <div class="name col-6">
                                    <input class="w-100 rounded-2 fw-semibold  border h-100 p-3" type="text" placeholder="Họ Và Tên">
                                </div>
                                <div class="email col-6">
                                    <input  class="w-100 fw-semibold  rounded-2 border h-100 p-3" type="email" placeholder="Email">
                                    
                                </div>
                                <div class="col-12 mt-4">
                                    <textarea class="w-100 fw-semibold rounded-2 border  p-3" name="" id="" rows="5"  placeholder="Viết bình luận"></textarea>
                                </div>
                            </div>
                            <div class="button-hover my-3">
                                <button type="submit" class=" fs-4">Gửi bình luận</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                <aside>
          <h5 class="text-uppercase fs-4 my-3 fw-bold">Danh Mục </h5>
          <div class="category-wrap-left border px-2">
            <ul>
              <?php  $i=0; ?>
              <?php foreach ($lis_menu as $value) : ?>
                <?php $args_mainmenu1 = [
                  ['parent_id', '=', $value->id],
                  ['status', '=', '1'],
                  ['position', '=', 'mainmenu']
                ];
                
                $lis_menu1 = Menu::where($args_mainmenu1)->orderBy('sort_order', 'asc')->get();
                if (count($lis_menu1) != 0) : ?>
                  <li class="mt-3 d-flex animationTop delay-0<?=++$i?>">
                    <a class="link-hover link fs-4 d-block fw-4" href="<?= $value->link ?>"><?= $value->name ?></a>
                    <i class="click-icon p-3 fa-solid fa-chevron-down"></i>
                  </li>
                  <ul class="category-dropdow display-none">
                    <?php foreach ($lis_menu1 as $value) : ?>
                      <?php $args_mainmenu2 = [
                        ['parent_id', '=', $value->id],
                        ['status', '=', '1'],
                        ['position', '=', 'mainmenu']
                      ];
                      $lis_menu2 = Menu::where($args_mainmenu2)->orderBy('sort_order', 'asc')->get(); ?>
                      <?php if (count($lis_menu2) != 0) : ?>
                        <li class="d-flex my-3"><a class="link-hover link d-block fs-4 fw-4 fw-4" href="<?= $value->link ?>"><?= $value->name ?></a>
                          <i class="click-icon p-3 fa-solid fa-chevron-down"></i>
                        </li>
                        <ul class="category-dropdow display-none">

                          <?php foreach ($lis_menu2 as $value) : ?>
                            <li class="mt-2 d-flex "><a class="link-hover fs-4 fw-4" href="<?= $value->link ?>"><?= $value->name ?></a></li>
                          <?php endforeach; ?>
                        </ul>


                      <?php else : ?>
                        <li class="d-flex my-3"><a class="link-hover link d-block fs-4 fw-4 fw-4" href="<?= $value->link ?>"><?= $value->name ?></a>
                        </li>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </ul>

                <?php else : ?>
                  <li class="mt-3 d-flex animationTop delay-0<?=++$i?>"><a class="link-hover fs-4 link d-block fw-4" href="<?= $value->link ?>"><?= $value->name ?></a></li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </div>
        </aside>
        <div class="wrap-hot mt-5">
          <h3 class="fs-2 text-uppercase my-4 link-hover">Bộ sưu tập hot</h3>

          <div class="list-product-mini">
            <?php foreach ($list_product2 as $value): ?>
              <div class="product-mini-item mb-3 border p-2 ">
                <div class="row">
                  <div class="col-4"><img src="public/image/product/<?= $value->image ?>" alt=""></div>
                  <div class="col">
                    <div class="product-content-mini">
                      <h4 class="  my-2"><a class="link-hover"
                          href="?option=product&slug=<?= $value->slug ?>"><?= $value->name ?></a></h4>
                      <span class="color-red fw-bold fs-3">268.000đ</span>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
                </div>
            </div>


        </section>
    </div>
    <?php require_once('views/frontend/footer.php'); ?>
