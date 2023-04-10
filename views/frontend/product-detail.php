<?php require_once('views/frontend/header.php'); ?>
<?php

use App\Models\Product;
use App\Models\Category;
use App\Models\Image;

$slug = $_REQUEST['slug'];
$row_product = Product::join('brand', 'brand.id', '=', 'product.brand_id')->where(([['product.slug', '=', $slug], ['product.status', '=', '1']]))
  ->select("product.*", 'brand.name as brand_name')
  ->first();


$name_cate = Category::find($row_product->category_id);

$row_image = Image::join('product', 'product.id', '=', 'image.id_product')->where(([['product.slug', '=', $slug], ['product.status', '=', '1']]))
  ->select("image.*")
  ->get();


$img = Image::where('id_product', $row_product->id)->first();
$title = $row_product['name'];
$list_product = Product::join('brand', 'brand.id', '=', 'product.brand_id')->where([['product.status', '=', '1'], ['brand.id', '=', $row_product->brand_id], ['product.id', '!=', $row_product->id]])
  ->select("product.*")->limit(5)
  ->get();


$list_product2 = Product::where('status', '=', 1)->orderBy('price', 'desc')->limit(6)->get();

?>

<div class="container mt-5">
  <div class="breadcrumb">
    <ul class="d-flex">
      <li class="">
        <a class="me-3" href="#">Trang chủ</a>
        <i class="fa fa-angle-right"></i>
      </li>
      <li>
        <a class="me-3" href="#">Sản phẩm</a>
        <i class="fa fa-angle-right"></i>
      </li>
      <li class=""><?= $row_product->name ?></li>
    </ul>
  </div>
  <h1 class="text-center color-red fw-bold"><?= $name_cate->name ?></h1>
  <section class="product mt-5">
    <div class="row">
      <div class="col-md">
        <div class="row">
          <div class="col-md-5 detail-image p-0 border animationTop">
            <div id="carouselExampleIndicators" class="carousel slide h-100" data-bs-ride="true">
              <div class="carousel-inner h-100">
                <div class="carousel-item active h-100">
                  <img src="public/image/product/<?= $row_product->image ?>" class="d-block w-100 h-100"
                    alt="<?= $row_product->name ?>" />
                </div>
                <?php foreach ($row_image as $value): ?>
                  <div class="carousel-item h-100">
                    <img src="public/image/product/<?= $value->name ?>" class="d-block w-100 h-100"
                      alt="<?= $row_product->name ?>" />
                  </div>
                <?php endforeach; ?>

              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="col-md-7 detail-content mt-4 ">
            <div class="d-flex details-image-items animationTop">
              <?php $i = 0; ?>
              <div class="me-3">
                <div data-id="" class="detail-item" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                  class="active" aria-current="true" aria-label="Slide 1">
                  <img src="public/image/product/<?= $row_product->image ?>"
                    alt="public/image/product/<?= $row_product->name ?>" />
                </div>
              </div>
              <?php foreach ($row_image as $value): ?>
                <div class="me-3">
                  <div data-id="" class="detail-item" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide-to="<?= ++$i ?>" class="" aria-current="true" aria-label="Slide <?= $i ?>">
                    <img src="public/image/product/<?= $value->name ?>" alt="" />
                  </div>
                </div>
              <?php endforeach; ?>


            </div>
            <div class="content my-4">
              <i class="fa fa-cut color-red fs-4"></i>
              <div class="ms-5 animationTop">
                <h2 class="title my-3 fs-1 fw-bold"><?= $row_product->name ?></h2>
                <div class="d-flex group-status my-2">
                  <div class="me-5 my-2"><span class="fs-4 me-2">Thương hiệu: </span><span
                      class="brand fs-4 color-red fw-bold"><?= $row_product->brand_name ?></span></div>
                  <div class="my-2"><span class="fs-4 me-2">Kho: </span><span class="fs-4 color-red fw-bold"> Còn
                      hàng</span></div>
                </div>
                <div class="product-reviews-size my-2"><a href="#"><i class="fa fa-sticky-note"></i> Hướng dẫn chọn
                    size</a></div>
                <div class="price d-flex my-4">
                  <h3 class="color-red fw-bold fs-1 me-4"><?= number_format($row_product->price) ?></h3>
                  <?php if ($row_product->pricesales != 0): ?>
                    <del class="fs-4 fw-bold text-secondary mt-2"><?= number_format($row_product->pricesale) ?></del>
                  <?php endif; ?>
                </div>
                <div class="size-product my-4">
                  <span class="fs-4 me-4 mt-1 fw-bold">Kích thước: </span>
                  <div class="size-item-product">
                    <input type="radio" name="size" id="size1" checked>
                    <label for="size1">37</label>
                    <input type="radio" name="size" id="size2">
                    <label class="size-active" for="size2">38</label>
                    <input type="radio" name="size" id="size3">
                    <label class="size-active" for="size3">39</label>
                    <input type="radio" name="size" id="size4">
                    <label class="size-active" for="size4">40</label>
                  </div>

                </div>
                <div class="soluong my-4 d-flex">
                  <span class="fs-4 me-4 mt-1 fw-bold">Số lượng: </span>
                  <button class="minus" ><i class="fa fa-minus fw-bold color-secondary"></i></button>
                  <input type="number" name="soluong" value="1" min="1" class="quantity">
                  <button class="plus"><i class="fa fa-plus fw-bold color-secondary"></i></button>
                </div>

              </div>
              <div class="button-action row px-3 animationTop">
                <a href="?option=cart&id=<?=$row_product->id?>" class="me col-md-6 btn-hover rounded-pill d-flex justify-content-center align-items-center fs-3 fw-bold" type="submit">Mua ngay </a>
                <div class="support  col-md-3 my-md-0 my-4  rounded-pill border border-danger"
                  onclick="location.href='tel:0333583800'">
                  <p class="m-0 ps-5  ">Mua số lượng lớn</p>
                  <span class="ps-4 fw-bold  fs-4">Gọi ngay 19006750</span>
                </div>
              </div>
            </div>

          </div>

        </div>
        <div class="tab mt-5 animationTop">
          <ul class="d-flex tab-header p-0 m-0">
            <li class="text-center tab-link active-tab"><span>Mô tả sản phẩm</span></li>
            <li class="text-center tab-link"><span>Thương hiệu</span></li>
            <li class="text-center tab-link"><span>Đánh giá</span></li>
          </ul>
          <div class="tab-content border p-4">
            <p class="text-secondary fs-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non aperiam quaerat
              cupiditate doloribus, ab libero mollitia dolorum distinctio aspernatur minima laboriosam perferendis
              sapiente sunt voluptatum, magni commodi vitae! Illo, ipsam.</p>
            <p class="text-secondary fs-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem
              assumenda laboriosam ea quas hic aperiam consectetur sed voluptates praesentium optio! In, facere.
              Laboriosam, ipsam possimus deleniti rem deserunt fugit mollitia.</p>
            <p class="text-secondary fs-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat repellendus
              veniam aut vel ducimus? Voluptatum, nemo? Eveniet, molestiae neque. Illum, rerum. Totam id ducimus
              doloremque harum, nulla quo est corrupti?</p>
          </div>
        </div>
      </div>

      <div class="col-md-3 ">
        <div class="border p-4">
          <div class="row py-4 animationTop ">
            <div class="col-2 ">
              <img src="https://bizweb.dktcdn.net/100/342/645/themes/701397/assets/srv_1.png?1677377108874" alt="">
            </div>
            <div class="col">
              <p class="p-0 m-0  fw-bold fs-4">Miễn phí vận chuyển</p>
              <span class="fs-5 text-secondary">Miễn phí vận chuyển nội thành</span>
            </div>
          </div>
          <div class="row py-4 animationTop delay-01">
            <div class="col-2 ">
              <img src="https://bizweb.dktcdn.net/100/342/645/themes/701397/assets/srv_2.png?1677377108874" alt="">
            </div>
            <div class="col">
              <p class="p-0 m-0  fw-bold fs-4">Đổi trả hàng</p>
              <span class="fs-5 text-secondary">Đổi trả lên tới 30 ngày</span>
            </div>
          </div>
          <div class="row py-4 animationTop delay-02">
            <div class="col-2 ">
              <img src="https://bizweb.dktcdn.net/100/342/645/themes/701397/assets/srv_3.png?1677377108874" alt="">
            </div>
            <div class="col">
              <p class="p-0 m-0  fw-bold fs-4">Tiết kiệm thời gian</p>
              <span class="fs-5 text-secondary">Mua sắm dễ hơn khi online</span>
            </div>
          </div>
          <div class="row py-4 animationTop delay-03">
            <div class="col-2 ">
              <img src="https://bizweb.dktcdn.net/100/342/645/themes/701397/assets/srv_4.png?1677377108874" alt="">
            </div>
            <div class="col">
              <p class="p-0 m-0  fw-bold fs-4">Tư vấn trực tiếp</p>
              <span class="fs-5 text-secondary">Đội ngũ tư vấn nhiệt tình</span>
            </div>
          </div>
        </div>
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
    <div class="container-md px-4">
      <h1 class="text-center fs-1 mt-5 pt-5">SẢN PHẨM TƯƠNG TỰ</h1>
      <p class="text-center">sản phẩm cùng hãng</p>

      <div class="row row-cols-2 row-cols-md-5 g-4">
        <?php foreach ($list_product as $values): ?>
          <?php $list_image = Image::join('product', 'product.id', '=', 'image.id_product')->where([['product.status', '!=', '0'], ['image.id_product', '=', $values->id]])
            ->select("image.*")->get();
          $dem = count($list_image);
          // echo $dem;
          ?>

          <div class="col ">
            <div class="card h-100 border border-0">
              <?php if ($values->pricesale != 0): ?>
                <span class="sale"><?= ceil(((($values->pricesale - $values->price) / $values->pricesale) * 100)) ?>%</span>
              <?php endif; ?>
              <a class="position-relative" href="?option=product&slug=<?= $values->slug ?>">
                <input type="radio" name="img-<?= ++$img_id ?>" id="img1-<?= $img_id ?>" checked>
                <div class="<?php if ($dem >= 1)
                  echo 'card-hover' ?>" title="<?= $values->name ?>">
                  <img src="public/image/product/<?= $values->image ?>" class="card-img-top card-item"
                    alt="<?= $values->name ?>">
                  <?php if ($dem > 0): ?>
                    <img src="public/image/product/<?= $list_image[0]->name ?>" class="card-img-top card-item"
                      alt="<?= $values->name ?>">
                  <?php endif; ?>
                </div>
                <?php if ($dem > 3): ?>
                  <input type="radio" name="img-<?= $img_id ?>" id="img2-<?= $img_id ?>">
                  <div class="card-hover" title="Nike Blazer x sacai x KAWS">
                    <img src="public/image/product/<?= $list_image[1]->name ?>?>" class="card-img-top card-item"
                      alt="Nike Blazer x sacai x KAWS">
                    <img src="public/image/product/<?= $list_image[2]->name ?>" class="card-img-top card-item"
                      alt="Nike Blazer x sacai x KAWS">
                  </div>
                <?php endif; ?>
                <div class="size fs-6">
                  <span class="size-item">39</span>
                  <span class="size-item"></span>
                  <span class="size-item">40</span>
                  <span class="size-item">41</span>
                  <span class="size-item">+2</span>
                </div>
              </a>

              <a href="?option=cart&id=<?= $values->id ?>"><span class="bag" title="Thêm vào giỏ hàng"><i
                    class="fa-solid fa-bag-shopping"></i></span></a>
              <div class="card-body">
                <h5 class="card-title"><a href="#">
                    <?= $values->name ?>
                  </a> </h5>
                <p>
                  <?= $values->brand ?>
                </p>
                <div class="row">
                  <div class="col-md-5">
                    <h5 class="price  text-danger ">
                      <?php echo number_format($values->price) ?>đ
                    </h5>
                  </div>
                  <?php if ($values->pricesale != 0): ?>
                    <div class="col-md-6">
                      <h5 class="text-decoration-line-through text-black-50">
                        <?= number_format($values->pricesale) ?>đ
                      </h5>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="shoer-list">
                  <div class="shoer-list-item"><label for="img1-<?= $img_id ?>"><img
                        src="public/image/product/<?= $values->image ?>" alt="<?= $values->name ?>"></label>
                  </div>

                  <?php if ($dem > 3): ?>
                    <div class="shoer-list-item"><label for="img2-<?= $img_id ?>"><img
                          src="public/image/product/<?= $list_image[3]->name ?>" alt="<?= $values->name ?>"></label>
                    </div>
                  <?php endif; ?>

                </div>
              </div>

            </div>
          </div>
        <?php endforeach; ?>
      </div>




    </div>
  </section>
</div>

<?php require_once('views/frontend/footer.php'); ?>