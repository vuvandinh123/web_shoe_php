
<?php
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Support\Facades\DB;
$price=0;
$cou=0;
if(!isset($_SESSION['usersiter']) ){
    header('location:?option=customer&f=login');
}
if(isset($_SESSION['cart_items'])){
    $reavert=array_reverse($_SESSION['cart_items']);
    $cou=count($reavert);
    
}
else{
    header('location:?option=cart_list');
}
$id=0;
if(isset($_POST['dat'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $detail=$_POST['detail'];


    $order=new Order();
    $order->deliveryphone=$phone;
    $order->code='1234567';
    $order->deliveryemail=$email;
    $order->deliveryname=$name;
    $order->deliveryaddress=$address;
    $order->detail=$detail;
    $order->user_id=$_SESSION['user_id'];
    $order->status=1;
    $order->save();
    $id = $order->id;
    
    if(isset($_SESSION['cart_items'])){
        $orderdetails = [];
        foreach($_SESSION['cart_items'] as $value){
            $orderdetails[] = [
                'order_id' => $id,
                'product_id' => $value['id'],
                'price' => $value['price'],
                'qty' => $value['qty'],
                'amount' => $value['total']
            ];
        }
        Orderdetail::insert($orderdetails);
    }
    header('location:?option=cart_list');
    
}
$email=$name=$phone='';
if(isset($_SESSION['usersiter']) ){
    $name=$_SESSION['name'];
    $email=$_SESSION['email'];
    $phone=$_SESSION['phone'];
}

$num = 0;
?>
<?php require_once('views/frontend/header.php') ?>

<div class="color-oder mt-5">
        <div class="container ">
            <div class="row">
                <div class="col-md-9">
                    <div class="breadcrumb">
                        <ul class="d-flex">
                            <li class="">
                                <a class="me-md-3 me-1" href="#">Trang chủ</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li class="">
                                <a class="me-md-3 me-1" href="#">Gio hàng</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li class="">Thanh toán</li>
                        </ul>
                    </div>
                    <h3 class="fs-1 fw-bold color-red  text-center">Đặt hàng</h3>
                    <form action="" method="post">
                        <div class="row">
                            <div class="">
                                <h3 class="color-red my-3 mt-5 text-uppercase">Thông tin nhận hàng</h3>
                                <div>
                                    <div class="row">
                                        <div class="col-6 my-3">

                                            <div class=" wave-group">
                                                <input required="" name="name" value="<?=$name?>" type="text" class="input-oder">
                                                <span class="bar"></span>
                                                <label class="label">
                                                    <span class="label-char" style="--index: 0">Họ&nbsp;</span>
                                                    <span class="label-char" style="--index: 1">Và&nbsp;</span>
                                                    <span class="label-char" style="--index: 2">Tên&nbsp;</span>
                                                    <span class="label-char" style="--index: 3"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 my-3">

                                            <div class="wave-group">
                                                <input required="" name="email" value="<?=$email?>" type="email" class="input-oder">
                                                <span class="bar"></span>
                                                <label class="label">
                                                    <span class="label-char" style="--index: 0">E</span>
                                                    <span class="label-char" style="--index: 1">m</span>
                                                    <span class="label-char" style="--index: 2">a</span>
                                                    <span class="label-char" style="--index: 3">i</span>
                                                    <span class="label-char" style="--index: 4">l</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="my-3">
                                            <div class="wave-group">
                                                <input required="" name="phone" value="<?=$phone?>" type="text" class="input-oder">
                                                <span class="bar"></span>
                                                <label class="label">
                                                    <span class="label-char" style="--index: 0">Số&nbsp;</span>
                                                    <span class="label-char" style="--index: 1">điện&nbsp;</span>
                                                    <span class="label-char" style="--index: 2">Thoại&nbsp;</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                       
                                    </div>
                                    <div class="my-4">
                                        <div class="wave-group">
                                            <input required="" name="address" type="text" class="input-oder">
                                            <span class="bar"></span>
                                            <label class="label">
                                                <span class="label-char" style="--index: 0">Địa chỉ nhà, tên
                                                    đường</span>

                                            </label>
                                        </div>
                                    </div>
                                    <div class="my-5">
                                        <div class="wave-group">
                                            <textarea required="" name="detail" type="text" class="input-oder"></textarea>
                                            <span class="bar"></span>
                                            <label class="label">
                                                <span class="label-char" style="--index: 0">Ghi chú (Tùy chọn)</span>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="color-red my-5">Vận chuyển</h3>
                            <div>
                                <div class="wave-group2  border rounded p-3 d-flex justify-content-between">
                                    <div>
                                        <input required="" id="vanchuyen" name="vanchuyen" type="radio" checked
                                            class=" me-3"></input>
                                        <label for="vanchuyen" class="">
                                            <span class="label-char fs-4" style="--index: 0">Giao hàng tận nơi</span>
                                        </label>
                                    </div>

                                    <span class=" fs-4">40.000đ</span>
                                </div>
                                <h3 class="color-red my-5 ">Thanh toán</h3>

                                <div class="wave-group2  border rounded p-3 d-flex justify-content-between">
                                    <div>
                                        <input required="" id="giaohang" name="thanhtoan" type="radio" checked
                                            class=" me-3"></input>
                                        <label for="giaohang" class="">
                                            <span class="label-char fs-4" style="--index: 0">Thanh toán khi nhận
                                                hàng</span>
                                        </label>
                                    </div>

                                    <span class=" fs-4"><i class="fa-regular fa-money-bill-1"></i></span>
                                </div>
                                <div class="wave-group2  border rounded p-3 my-3 d-flex justify-content-between">
                                    <div>
                                        <input required="" id="momo" name="thanhtoan" type="radio" checked
                                            class=" me-3"></input>
                                        <label for="momo" class="">
                                            <span class="label-char fs-4" style="--index: 0">Thanh toán bằng MoMo</span>
                                        </label>
                                    </div>

                                    <span class=" fs-4"><i class="fa-regular fa-money-bill-1"></i></span>
                                </div>
                                <div class="wave-group2  border rounded p-3 my-2 d-flex justify-content-between">
                                    <div>
                                        <input required="" id="bank" name="thanhtoan" type="radio" checked
                                            class=" me-3"></input>
                                        <label for="bank" class="">
                                            <span class="label-char fs-4" style="--index: 0">Chuyển khoản</span>
                                        </label>
                                    </div>

                                    <span class=" fs-4"><i class="fa-regular fa-money-bill-1"></i></span>
                                </div>
                            </div>
                            <div class="button-hover my-5 ">
                                <button type="submit" name="dat" class="w-100 fs-4">Đặt hàng</button>
                            </div>
                        </div>
                </div>
                <div class="col-md-3 border bg-fafa">
                    <div class="py-3 border-bottom">
                        <h3 class="">Đơn hàng ( <?=$cou?> sản phẩm)</h3>
                    </div>
                    <div class="list-cart-oder  " style="max-height: 300px; overflow-y: scroll; overflow-x: hidden;">               <?php if(isset($reavert)): ?>
                        <?php foreach($reavert as $value):?>
                            <?php $price+=$value['total']; ?>
                        <div class="cart-oder mt-3">
                            <div class="row">
                                <div class="col-2  rounded-2">
                                    <div class="overflow-hidden" style="height: 50px; width: 50px; border-radius: 5px;">
                                        <img class="w-100 h-100"
                                            src="public/image/product/<?=$value['img']?>"
                                            alt="">
                                    </div>

                                </div>
                                <div class="col-6 ms-1">
                                    <h5><a class="link-hover" href=""><?=$value['name']?></a></h5>
                                </div>
                                <div class="ms-2 col-md fs-5"><span class="color-secondary"><?=number_format($value['total']) ?>đ</span></div>

                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <p class='fs-3 color-red'>Không có sản phẩm</p>
                            <p class='fs-3 color-red'></p>
                        <?php endif;?>
                    </div>
                    <div class="d-flex mt-5 border-bottom border-top py-5">
                        <input style="height: 40px;" type="text" class="border fs-4 p-2 rounded-2 w-75"
                            placeholder="MÃ GIẢM GIÁ">
                        <button class="btn bg-info ms-3 text-white">Áp dụng</button>
                    </div>
                    <div class="d-flex justify-content-between my-4">
                        <div class="fs-4 fw-bold">Tạm tính:</div>
                        <span class="fs-4 color-red fw-semibold"><?=number_format($price)??0?></span>
                    </div>
                    <div class="d-flex justify-content-between my-5">
                        <div class="fs-4 fw-bold">Phí vận chuyển:</div>
                        <span class="fs-4 color-red fw-semibold">40.000đ</span>
                    </div>
                    <div class="border-bottom"></div>
                    <div>
                    </div>
                    <div class="d-flex justify-content-between my-3 mb-5">
                        <div class="fs-2 fw-bold">Tổng cộng:</div>
                        <span class="fs-3 color-red fw-bold"><?=number_format($price+40000)?></span>
                    </div>
                    <a class="link-hover mt-4" href="?option=cart_list"><i class="fa-solid fa-angles-left fs-5"></i> Quay lại giỏ hàng</a>
                </div>
            </div>
        </div>

        </form>
        <button onclick='window.print()'>In hóa đơn</button>
    </div>


    </div>
    </div>
    </div>
<?php require_once('views/frontend/header.php') ?>
