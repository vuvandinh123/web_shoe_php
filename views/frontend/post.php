<?php require_once('views/frontend/header.php'); ?>
<?php

use App\Models\Post;
use App\Models\Menu;
use App\Models\Product;

$args_mainmenu = [
  ['parent_id', '=', '0'],
  ['status', '=', '1'],
  ['position', '=', 'mainmenu']
];
$lis_menu = Menu::where($args_mainmenu)->orderBy('sort_order', 'asc')->get();

$list_post = Post::where([['status', '=', '1'], ['type', '!=', 'page']])->get();
$list_product2 = Product::where('status', '=', 1)->orderBy('price', 'desc')->limit(6)->get();

?>
<?php

?>

<div class="container mt-5">
  <div class="breadcrumb">
    <ul class="d-flex">
      <li class="">
        <a class="me-md-3 me-1" href="index.php">Trang chủ</a>
        <i class="fa fa-angle-right"></i>
      </li>
      <li class="">Tin tức</li>
    </ul>
  </div>
  <h1 class="text-center color-red fw-bold">Tin tức</h1>
  <section>
    <div class="row">
      <div class="col-md-3 ">
        <aside>
          <h5 class="text-uppercase fs-3 my-5">danh mục tin tức</h5>
          <div class="category-wrap-left border px-2">
            <ul>
              <?php $i = 0; ?>
              <?php foreach ($lis_menu as $value) : ?>
                <?php $args_mainmenu1 = [
                  ['parent_id', '=', $value->id],
                  ['status', '=', '1'],
                  ['position', '=', 'mainmenu']
                ];

                $lis_menu1 = Menu::where($args_mainmenu1)->orderBy('sort_order', 'asc')->get();
                if (count($lis_menu1) != 0) : ?>
                  <li class="mt-3 d-flex animationTop delay-0<?= ++$i ?>">
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
                  <li class="mt-3 d-flex animationTop delay-0<?= ++$i ?>"><a class="link-hover fs-4 link d-block fw-4" href="<?= $value->link ?>"><?= $value->name ?></a></li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </div>
        </aside>
        <div class="wrap-hot mt-5">
          <h3 class="fs-2 text-uppercase my-4 link-hover">Bộ sưu tập hot</h3>

          <div class="list-product-mini">
            <?php foreach ($list_product2 as $value) : ?>
              <div class="product-mini-item mb-3 border p-2 ">
                <div class="row">
                  <div class="col-4"><img src="public/image/product/<?= $value->image ?>" alt=""></div>
                  <div class="col">
                    <div class="product-content-mini">
                      <h4 class="  my-2"><a class="link-hover" href="?option=product&slug=<?= $value->slug ?>"><?= $value->name ?></a></h4>
                      <span class="color-red fw-bold fs-3">268.000đ</span>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

      </div>
      <div class="col-md-9 my-5">
        <div class="row animationLeft">
          <?php $i=0; foreach($list_post as $value): ?>
          <div class="my-3 <?php if($i==0) echo 'col-12'; else echo 'col-6'; $i++; ?>">
            <div class="row">
              <div class="col-4">
                <div class="img-block-left">
                  <a href=""><img class="" src="public/image/post/<?=$value->image?>" alt=""></a>

                </div>
              </div>
              <div class="col-md-8">
                <h5 class="fs-4"><a class="link-hover fs-3" href="?option=post&cat=<?=$value->slug?>"><?=$value->title?></a></h5>
                <p class="wrap-text color-secondary fs-4"><?=$value->metakey?></p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="col-md-6 my-md-1 my-2">
            <div class="row">
              <div class="col-4">
                <div class="img-block-left">
                  <a href="">
                    <img class="" src="https://bizweb.dktcdn.net/thumb/large/100/342/645/articles/adidas-originals-prophere-1.jpg?v=1545574209190" alt="">
                  </a>

                </div>
              </div>
              <div class="col">
                <h5 class="fs-4"><a class="link-hover fs-3" href="">Đi du lịch nên chọn 5 kiểu giầy này sẽ giúp bạn cá tính hơn</a></h5>
                <p class="wrap-text color-secondary fs-4">Khi đi du lịch, bạn không thể mang 5,6 đôi giầy giống như quần áo. Nên hãy chọn đôi giầy thích hợ... </p>
              </div>
            </div>
          </div>

          
        </div>




      </div>
    </div>
  </section>
</div>

<?php require_once('views/frontend/footer.php'); ?>