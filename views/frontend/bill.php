<?php

use App\Models\Order;
use App\Models\User;
use App\Models\Orderdetail;
use App\Models\Product;

$id = $_SESSION['user_id'];

$list_bill = Order::join('orderdetail', 'order.id', '=', 'orderdetail.order_id')->where('order.user_id',$id)->select('order.deliveryaddress', 'order.status', 'order.deliveryname', 'order.deliveryphone', 'order.created_at', 'order.deliveryemail', 'order.id as id_order', 'orderdetail.*')->orderBy('created_at', 'desc')->get();
// $list=Orderdetail::where('order_id',$list_bill->id)->get();


// echo '<pre>';
// print_r($list_bill);
// echo '</pre>';

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
    <h1 class="text-center color-red fw-bold">Đơn mua</h1>
    <section class="cart my-5 p-2">
        <h2 class="fw-bold fs-1">
            Đơn hàng đã đặt
            <span class="text-secondary fs-4">(1 sản phẩm )</span>
        </h2>
        <?php if(count($list_bill)>0): ?>
        <div class="wrapper my-5">
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

            <?php foreach ($list_bill as $value) : ?>
                <?php $product = Product::find($value->product_id); ?>
                <div class="row border-bottom py-md-5 py-3 animationLeft">
                    <div class="col-md-6 d-flex">
                        <div class="cart-img me-5">
                            <img src="public/image/product/<?= $product->image ?>" alt="" />
                        </div>
                        <div class="cart-content my-3">
                            <h3 class="mb-4 link-hover"><a href="?option=product&slug=<?= $product->slug ?>"><?= $product['name'] ?></a> </h3>
                            <div>
                                <?php if ($value->status == 2) : ?>
                                    <span class='btn bg-success text-white fw-bold fs-5 '> Đã Nhận</span>
                                <?php else : ?>
                                    <span class='btn bg-danger text-white fw-bold fs-5 '> Đang giao</span>
                                <?php endif; ?>

                            </div>
                            <p class='my-3 fs-4 color-secondary'><span>Ngày đặt: </span> <?= $value['created_at'] ?></p>        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$value->id?>">
              Xem Chi tiết đơn hàng
            </button>
                        </div>
                    </div>
                    <div class="col-md-2 text d-flex align-items-center">
                        <span class="fs-3 fw-500 color-red d-md-block d-none"><?= number_format($product->price) ?>đ</span>
                    </div>
                    <div class="col-md-2 col-6 text d-flex align-items-center">
                        <div class="px-3 border">
                            <span class="fs-3"><?= $value->qty ?></span>
                        </div>
                    </div>
                    <div class="col-md-2 col-6 text d-flex align-items-center">
                        <span class="fs-3 me-3 fw-500 d-md-none d-block">Tổng tiền: </span><span class="fs-3 fw-500 color-red total-product"><?= number_format($value['amount']) ?>đ</span>
                    </div>
                </div>
                <div class="modal fade" id="staticBackdrop<?=$value->id?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-2" id="staticBackdropLabel">Chi Tiết Đơn Hàng</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="invoice-print<?=$value->id?>">
                                <div class="row">
                                    <div class="col-12"> <img src="public/image/product/<?=$product->image?>" alt=""></div> 
                                    <div class="col">
                                        <div>
                                        <h4 class='color-red my-3 fs-2'>Thông Tin Sản Phẩm</h4>
                                        <h3 class="fs-4"><span class="fw-bold">Tên sản phẩm: </span> <?=$product->name?></h3>
                                        <p class="fs-4"><span class="fw-bold">Mã đơn hàng: </span><?=$value->id?></p>
                                        <p class='fs-4'><span class='fw-bold'>Số lượng: </span> <span><?=$value->qty?></span></p>
                                        <p class="fs-4"><span class='fw-bold'>Thời gian đặt: </span> <?=$value->created_at?></p>
                                        </div>
                                        <h4 class='color-red my-3 fs-2'>Thông Tin Người Nhận</h4>
                                        <p class="fs-4"><span class='fw-bold'>Tên : </span> <?=$value->deliveryname?></p>
                                        <p class="fs-4"><span class='fw-bold'>Địa chỉ : </span><?=$value->deliveryaddress?></p>
                                        <p class="fs-4"><span class='fw-bold'>Số điện thoại: </span><?=$value->deliveryphone?></p>
                                        <p class="fs-4"><span class='fw-bold'>Email: </span><?=$value->deliveryemail?></p>
                                    </div> 
                                </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="" type="button" class="btn btn-secondary" >Đóng</a>
                                <button type="button" onclick="printInvoice('invoice-print<?=$value->id?>')" class="btn btn-primary">IN HÓA ĐƠN</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php else :?>
            <p class='color-red fs-2 text-center py-5'>Đơn hàng trống</p>
            <?php endif; ?>
        <a class="total-item-2 p-3 my-5" href="?option=product">Tiếp tục mua hàng</a>
    </section>
</div>
<?php require_once('views/frontend/footer.php') ?>
<script>
function printInvoice(id) {
    var printContent = document.getElementById(id);
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContent.innerHTML;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>