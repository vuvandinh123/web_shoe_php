<?php
$cou=0;
if(isset($_SESSION['cart_items'])){
    $reavert=array_reverse($_SESSION['cart_items']);
    $cou=count($reavert);
}

?>



<?php require_once('views/frontend/header.php') ?>

<div class="container mt-5">
    <div class="breadcrumb">
        <ul class="d-flex">
            <li class="">
                <a class="me-md-3 me-1" href="index.php">Trang chủ</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li class="">Gio hàng</li>
        </ul>
    </div>
    <h1 class="text-center color-red fw-bold">Gio hang</h1>
    <section class="cart my-5 p-2">
        <h2 class="fw-bold fs-1">
            Gio hàng của bạn
            <span class="text-secondary fs-4">( <span><?=$cou?></span> sản phẩm )</span>
        </h2>
        <?php if(isset($reavert)): ?>
        <div class="wrapper">
            <div class="row border-bottom py-4">
                <div class="col-md-6 col-5">
                    <strong class="fs-2">Sản phẩm</strong>
                </div>
                <div class="col-md-2 col-3 d-md-block d-none">
                    <strong class="fs-2">Giá</strong>
                </div>
                <div class="col-md-2 col-3 d-md-block d-none">
                    <strong class="fs-2">Số Lượng</strong>
                </div>
                <div class="col-md-2 col-4 d-md-block d-none">
                    <strong class="fs-2">Thanh tiền</strong>
                </div>
            </div>
            
            <?php $total2=0;  foreach($reavert as $value): ?>
                <?php    $total2+=$value['total'] ?>
            <div class="row border-bottom py-md-5 py-3 animationLeft">
                <div class="col-md-6 d-flex">
                    <div class="cart-img me-5">
                        <img src="public/image/product/<?=$value['img']?>" alt="" />
                    </div>
                    <div class="cart-content my-3">
                        <h3 class="mb-4 link-hover"><a href="?option=product&slug=<?=$value['slug']?>"><?=$value['name']?></a> </h3>
                        <a class="color-red" href="?option=unsert&id=<?=$value['id']?>"><i class="fa fa-trash me-3"></i>Xóa sản phẩm</a>
                    </div>
                </div>
                <div class="col-md-2 text d-flex align-items-center">
                    <span class="fs-3 fw-500 color-red d-md-block d-none"><?=number_format($value['price'])?>đ</span>
                </div>
                <div class="col-md-2 col-6 text d-flex align-items-center">
                    <div class="soluong my-4 d-flex">
                        <button class="minus" class="">
                            <i class="fa fa-minus fw-bold"></i>
                        </button>
                        <input type="number" name="soluong" value="<?=$value['qty']?>" min="1" class="quantity" />
                        <button class="plus"><i class="fa fa-plus fw-bold"></i></button>
                    </div>
                </div>
                <div class="col-md-2 col-6 text d-flex align-items-center">
                    <span class="fs-3 me-3 fw-500 d-md-none d-block">Tổng tiền: </span><span class="fs-3 fw-500 color-red total-product"><?=number_format($value['total']) ?>đ</span>
                </div>
            </div>
            <?php endforeach; ?>
            
            
        </div>
        <div class="mt-5 d-flex justify-content-end">
            <div class="total pb-4 border-bottom d-flex justify-content-between">
                <span class="fs-2 me-3 fw-bold">Thành tiền: </span>
                <span class="fs-2 fw-bold color-red"><?=number_format($total2)?>đ</span>
            </div>
        </div>

        <div class="d-flex justify-content-end my-3">
            <a class="total-submit btn-hover" href="?option=oder">Tiến hành thanh toán</a>
        </div>
        <?php else: ?>
                <p class='fs-3 text-center my-5 color-red'>Không có sản phẩm nào. Quay lại cửa hàng để tiếp tục mua sắm.!</p>
        <?php endif; ?>
        <a class="total-item-2 p-3" href="?option=product">Tiếp tục mua hàng</a>
    </section>
</div>
<?php require_once('views/frontend/footer.php') ?>
