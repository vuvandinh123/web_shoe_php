<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
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
                <a href="index.php?option=product&category=giay-the-thao"><img class="w-100" src="http://localhost/BaoCaoThucTap_LTW_Vu_Van_Dinh/public/images/topbar.webp" alt="anh"></a>

            </div>
            <div class="container">
                <div class="d-flex header-search justify-content-between align-items-center">
                    <div class="btn-mb cusom ms-4">
                        <span><img src="https://bizweb.dktcdn.net/100/342/645/themes/701397/assets/i_menubar.png?1677377108874" alt=""></span>
                    </div>
                    <div class=" img-logo"><a href="index.php"><img class="" src="public/image/logo/logo1.png" alt="logo.webp"></a>
                    </div>
                    <div class=" search ">
                        <div class="input-group search-md mx-auto mb-3 ">

                            <form action="" method="get">
                                <input type="text" name="value" class="form-control border-end-0 search" placeholder="Tim kiem" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <button name="search" type="submit" class="input-group-text bg-white text-danger border-start-0 search-button" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>

                        </div>

                    </div>

                    <div class="">
                        <div class="row">
                            <div class="d-flex justify-content-end  align-items-center">
                                <div class="search-mb text-white ">
                                    <i class="fa-solid fa-search fs-3 "></i>
                                    <div class="form-search-mb">
                                        <form action="" method="post">
                                            <input class="border" name="value" type="text" placeholder="Tim kiem">
                                            <button name="search" type='submit'><i class="fa-solid fa-search fs-3 "></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="support1  rounded-pill border border-danger" onclick="location.href='tel:0333583800'">
                                    <p class="m-0 ps-5  ">Tư vấn bán hàng</p>
                                    <span class="ps-4 fw-bold  fs-4">Gọi ngay 19006750</span>
                                </div>
                                <?php if (!isset($_SESSION['usersiter'])) : ?>
                                    <div class=" account ms-4">
                                        <div class="account-icon text-white">
                                            <span class="fs-2 ms-4"><i class="fa-solid fa-user pt-3 "></i></span>
                                        </div>
                                        <div class="icon-hover">
                                            <a class="btn-hover dn mt-3 text-center fs-4 fw-bold" href="?option=customer&f=login">Đăng nhập</a>
                                            <a class="btn-hover dk mt-3 text-center fs-4 fw-bold" href="?option=customer&f=logup">Đăng ký</a>
                                        </div>
                                    </div>
                                <?php else : ?>

                                    <div class=" account ms-4">
                                        <div id="acc" class="account-icon bg-white  border-0 text-white rounded-circle ">
                                            <img class="w-100 h-100 rounded-circle " src="public/image/user/<?= $_SESSION['image'] ?>" alt="">
                                        </div>

                                        <div class="usersiter " id="usersiter">
                                            
                                            <div class="row p-3">
                                                <div class="col-4  py-3 rounded-circle ">
                                                    <img class="rounded-circle " width="50px" height="50px" src="public/image/user/<?= $_SESSION['image'] ?>" alt="">
                                                </div>
                                                <div class="col py-3">
                                                    <div>

                                                        <a class="fs-3 text-dark" href="?option=profile&username=<?= $_SESSION['usersiter'] ?>"><b>
                                                                <?= $_SESSION['name'] ?>
                                                            </b></a>
                                                    </div>

                                                    <p>@
                                                        <?= $_SESSION['usersiter'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class='usersiter_content px-3'>


                                            <div class="d-flex justify-content-between align-items-center my-4">
                                                <div class="w-100">
                                                    <a class=" link-hover" href="?option=profile&username=<?= $_SESSION['usersiter'] ?>"><i class="fa-solid fa-user fs-3 me-3"></i>Trang
                                                        cá nhân</a>
                                                </div>
                                                <i class="fa-solid fa-chevron-right mr-5"></i>

                                            </div>
                                            <div class="d-flex justify-content-between align-items-center my-4">
                                                <div>
                                                    
                                                    
                                                    <a class=" link-hover" href="?option=cart_list"><i class="fa-solid fa-cart-shopping fs-3 me-3"></i>Giỏ hàng</a>
                                                </div>
                                                <i class="fa-solid fa-chevron-right mr-5"></i>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center my-4">
                                                <div>
                                                
                                                    
                                                    <a class=" link-hover" href="?option=bill"><i class="fa-solid fa-paper-plane fs-3 me-3"></i>Đơn hàng</a>
                                                </div>
                                                <i class="fa-solid fa-chevron-right mr-5"></i>
                                            </div>
                                            <div class="col-12 my-3 d-flex justify-content-end">
                                                <a class="btn-hover btn btn-danger  ms-3 dk mt-3 text-center fs-4 fw-bold" href="?option=customer&f=logout">Đăng xuất <i class="fa-solid fa-right-from-bracket ms-2"></i></a>
                                            </div>
                                        </div>
                                        </div>
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
                                    <div class="account-icon cart  text-white position-relative <?= $hide ?>" data-count='<?= $count ?>'>
                                        <a class="text-white" href="?option=cart_list"><span class="fs-2 ms-3"> <i class="fa-solid fa-cart-shopping mt-3"></i> </span></a>
                                        <?php if ($reversed != 0) : ?>
                                            <div class="cart-sidebar position-absolute">
                                                <div id="cart-top" class=" cart-top">
                                                    <?php foreach ($reversed as $item) : ?>
                                                        <?php $total += $item['total'] ?>

                                                        <div class="cart-item d-flex p-3">
                                                            <div class="cart-img "><a href="?option=product&slug=<?= $item['slug'] ?>"> <img class="w-100" src="public/image/product/<?= $item['img'] ?>" alt="">
                                                                </a></div>
                                                            <div class="cart-content w-100 ms-3">
                                                                <div class="cart-name  mb-4">
                                                                    <h4><a class="text-dark" href="?option=product&slug=<?= $item['slug'] ?>"><?= $item['name'] ?> </a></h4>
                                                                </div>
                                                                <div class="cart-price text-success fs-5 my-2"><span class='px-3 py-1 border'>
                                                                        <?= $item['qty'] ?>
                                                                    </span></div>
                                                                <div class="cart-price text-success fs-5">
                                                                    <?= number_format($item['total']) ?>đ
                                                                </div>
                                                            </div>
                                                            <span class='text-success fs-4 text-danger p-3'><a class="text-success" href="?option=unsert&id=<?= $item['id'] ?>"> <i class="fa-solid fa-trash-can"></i></a></span>
                                                        </div>
                                                    <?php endforeach; ?>

                                                </div>

                                                <div class="cart-bottom border-top d-flex justify-content-between text-dark p-3">
                                                    <div class='fs-2 '>Tổng tiền</div>
                                                    <div class='fs-2 text-danger fw-bold'>
                                                        <?= number_format($total) ?>đ
                                                    </div>

                                                </div>
                                                <div class='text-dark thanh-toan my-5'><a class="btn-link-cart" href='?option=oder'>Tiến hành thanh toán</a></div>
                                            </div>
                                        <?php else : ?>
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
    <div class="nav">
        <div class=" pss">
            <div class="row nav-1 ">

                <?php require_once('views/frontend/mod-mainmenu.php') ?>
            </div>
        </div>
    </div>
    </div>
    <script>

    </script>