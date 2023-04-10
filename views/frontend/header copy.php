<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="public/css/inheritance.css">

    <link rel="stylesheet" href="public/css/hearder.css">
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="public/css/news.css">
    <link rel="stylesheet" href="public/css/detail-product.css" />
    <link rel="stylesheet" href="public/css/loginsiter.css" />
    <link rel="stylesheet" href="public/css/cart.css" />
    <link rel="stylesheet" href="public/css/oder.css" />
    <link rel="stylesheet" href="public/css/toasts.css" />
    <link rel="stylesheet" href="public/css/post-category.css" />

</head>

<body>
    <?php

    use App\Models\Product;

    $uri = $_SERVER['REQUEST_URI'];
    $_SESSION['url'] = $uri;

    $product_search = Product::where('status', '=', '1')->get() ?>
    <!-- hearder -->
    <?php
    if (isset($_POST['search']) && !empty($_POST['value'])) {
        $key = $_POST['value'];
        header('location:index.php?option=product&s=' . $key);
    }
    ?>
    <form action="index.php?option=product" method="post">
        <div class="hearder">
            <div class="topbar d-md-block d-none">
                <a href="index.php?option=product&category=giay-the-thao"><img class="w-100"
                        src="http://localhost/BaoCaoThucTap_LTW_Vu_Van_Dinh/public/images/topbar.webp" alt="anh"></a>

            </div>
            <div class="container">
                <div class="row ">
                    <div class="col-5 img-logo"><a href="index.php"><img class="d-inline"
                                src="public/image/logo/logo.png" alt="logo.webp"></a>
                    </div>
                    <div class="col-md-3 search">
                        <div class="input-group mb-3 mt-5">
                            <form action="" method="get">
                                <input type="text" name="value" class="form-control border-end-0 search"
                                    placeholder="Tim kiem" aria-label="Recipient's username"
                                    aria-describedby="basic-addon2">
                                <button name="search" type="submit"
                                    class="input-group-text bg-white text-danger border-start-0 search-button"
                                    id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>

                        </div>
                    </div>

                    <div class="col-md-4 d-md-block d-none">
                        <div class="row">
                            <div class="d-flex">
                                <div class="support1  rounded-pill border mt-5 border-danger"
                                    onclick="location.href='tel:0333583800'">
                                    <p class="m-0 ps-5  ">Tư vấn bán hàng</p>
                                    <span class="ps-4 fw-bold  fs-4">Gọi ngay 19006750</span>
                                </div>
                                <?php if (!isset($_SESSION['usersiter'])): ?>
                                    <div class=" account ms-4">
                                        <div class="account-icon mt-5 text-white">
                                            <span class="fs-2 ms-4"><i class="fa-solid fa-user pt-3 "></i></span>
                                        </div>
                                        <div class="icon-hover">
                                            <a class="btn-hover dn mt-3 text-center fs-4 fw-bold"
                                                href="?option=customer&f=login">Đăng nhập</a>
                                            <a class="btn-hover dk mt-3 text-center fs-4 fw-bold"
                                                href="?option=customer&f=logup">Đăng ký</a>
                                        </div>
                                    </div>
                                <?php else: ?>

                                    <div class=" account ms-4">
                                        <div class="account-icon bg-white mt-5 border-0 text-white rounded-circle "
                                            data-bs-toggle="dropdown" aria-expanded="false" fdprocessedid="7uyqx5">
                                            <img onclick="click12();" class="w-100 h-100 rounded-circle "
                                                src="public/image/user/<?= $_SESSION['image'] ?>" alt="">
                                        </div>
                                        <ul class="dropdown-menu m-0 user border-0">
                                            <div class="usersiter" id="usersiter">
                                                <div class="row p-3">
                                                    <div class="col-4  py-5 rounded-circle ">
                                                        <img class="rounded-circle " width="50px" height="50px"
                                                            src="public/image/user/<?= $_SESSION['image'] ?>" alt="">
                                                    </div>
                                                    <div class="col py-5">
                                                        <a class="fs-3 text-dark"
                                                            href="?option=profile&username=<?= $_SESSION['usersiter'] ?>"><b>
                                                                <?= $_SESSION['name'] ?>
                                                            </b></a>
                                                        <p>@
                                                            <?= $_SESSION['usersiter'] ?>
                                                        </p>
                                                    </div>
                                                    <hr>
                                                    <div class="col-12 ">
                                                        <a class="ms-3 fs-3"
                                                            href="?option=profile&username=<?= $_SESSION['usersiter'] ?>">Trang
                                                            cá nhân</a>
                                                    </div>
                                                    <br>
                                                    <div class="col-12 my-3 ">
                                                        <a class="ms-3 fs-3" href="?option=cart_list">Gio hàng</a>
                                                    </div>
                                                    <div class="col-12 my-2 ">
                                                        <a class="ms-3 fs-3" href="?option=bill">Đơn hàng</a>
                                                    </div>
                                                    <div class="col-12 my-3 d-flex justify-content-end">
                                                        <a class="btn-hover btn btn-danger  ms-3 dk mt-3 text-center fs-4 fw-bold"
                                                            href="?option=customer&f=logout">Đăng xuất</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <?php $reversed = isset($_SESSION['cart_items']) ? array_reverse($_SESSION['cart_items']) : 0;
                                $total = 0;
                                $hide = 'cart-hide';
                                $count = 0;
                                if (is_array($reversed)) {
                                    $hide = '';
                                    foreach ($reversed as $value) {
                                        $count += $value['qty'];
                                    }
                                }

                                ?>
                                <div class=" ms-5">
                                    <div class="account-icon cart  mt-5 text-white position-relative <?= $hide ?>"
                                        data-count='<?= $count ?>'>
                                        <a class="text-white" href="?option=cart_list"><span class="fs-2 ms-3"> <i
                                                    class="fa-solid fa-cart-shopping mt-3"></i> </span></a>
                                        <?php if ($reversed != 0): ?>
                                            <div class="cart-sidebar position-absolute">
                                                <div id="cart-top" class=" cart-top">
                                                    <?php foreach ($reversed as $item): ?>
                                                        <?php $total += $item['total'] ?>

                                                        <div class="cart-item d-flex p-3">
                                                            <div class="cart-img "><a
                                                                    href="?option=product&slug=<?= $item['slug'] ?>"> <img
                                                                        class="w-100"
                                                                        src="public/image/product/<?= $item['img'] ?>" alt="">
                                                                </a></div>
                                                            <div class="cart-content w-100 ms-3">
                                                                <div class="cart-name  mb-4">
                                                                    <h4><a class="text-dark"
                                                                            href="?option=product&slug=<?= $item['slug'] ?>"><?= $item['name'] ?> </a></h4>
                                                                </div>
                                                                <div class="cart-price text-success fs-5 my-2"><span
                                                                        class='px-3 py-1 border'>
                                                                        <?= $item['qty'] ?>
                                                                    </span></div>
                                                                <div class="cart-price text-success fs-5">
                                                                    <?= number_format($item['total']) ?>đ
                                                                </div>
                                                            </div>
                                                            <span class='text-success fs-4 text-danger p-3'><a
                                                                    class="text-success"
                                                                    href="?option=unsert&id=<?= $item['id'] ?>"> <i
                                                                        class="fa-solid fa-trash-can"></i></a></span>
                                                        </div>
                                                    <?php endforeach; ?>

                                                </div>

                                                <div
                                                    class="cart-bottom border-top d-flex justify-content-between text-dark p-3">
                                                    <div class='fs-2 '>Tổng tiền</div>
                                                    <div class='fs-2 text-danger fw-bold'>
                                                        <?= number_format($total) ?>đ
                                                    </div>

                                                </div>
                                                <div class='text-dark thanh-toan my-5'><a class="btn-link-cart"
                                                        href='?option=oder'>Tiến hành thanh toán</a></div>
                                            </div>
                                        <?php else: ?>
                                            <div class="cart-sidebar position-absolute">
                                                <div class="text-success p-4 fs-3">chưa có sản phẩm trong giỏ hàng</div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </form>
    <style>
        .drop_down-item {
            display: flex;
            justify-content: space-between;
        }
    </style>
    <div class="nav d-md-block d-none">
        <div class="container pss">
            <div class="row nav-1 ">
                <?php require_once('views/frontend/mod-mainmenu.php') ?>
            </div>
        </div>
    </div>
    </div>