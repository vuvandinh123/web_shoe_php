<?php
require_once('vendor/autoload.php');
require_once('config/database.php');

use App\Models\User;

$num = 0;
if (isset($_POST['dangky'])) {
    $user['name'] = $_POST['name'];
    $user['username'] = $_POST['username'];
    $user['password'] = sha1($_POST['password']);
    $user['email'] = $_POST['email'];
    $user['image'] = 'logo_user.png';
    $user['phone'] = $_POST['phone'];
    $user['cover_image'] = 'anhbia.webp';

    $num = User::where('username', '=', $user['username'])->count();
    if ($num != 0) {
        $error = "tên tài khoản đã tồn tại";
    } else {
        User::insert($user);
        header('location: ?option=customer&f=login');
    }
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
            <li class="">Đăng ký</li>
        </ul>
    </div>
    <style>
        .invalid input {
            border-color: #d93025;
        }

        .input-field .show-hide {
            position: absolute;
            right: 13px;
            font-size: 18px;
            color: #919191;
            cursor: pointer;
            padding: 3px;
        }

        .field .error {
            display: flex;
            align-items: center;
            margin-top: 6px;
            color: #d93025;
            font-size: 13px;
            display: none;
        }

        .invalid .error {
            display: flex;
        }

        .error .error-icon {
            margin-right: 6px;
            font-size: 15px;
        }
        .create-password .error {
  align-items: flex-start;
}
.create-password .error-icon {
  margin-top: 4px;
}
    </style>
    <h1 class="text-center color-red fw-bold animationLeft">Đăng ký tài khoản</h1>
    <section class="my-5">
        <h3 class="fw-500 text-uppercase">Đăng ký tài khoản</h3>
        <p class="my-3 fs-4">Nếu chưa có tài khoản vui lòng đăng ký tại đây</p>
        <div class="form-register">
            <form action="" id="form-logup" method="post">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="first_register animationTop">
                            <div class=' '>
                                <label class="d-block fs-4 mt-5 mb-3" for="first-name">Họ Và Tên <span class="color-red fs-3">*</span></label>
                                <input class="border rounded-2 w-100 p-3 fs-4" type="text" name="name" id="first-name" placeholder="Họ Và Tên" required>
                            </div>
                            
                        </div>
                        <div class="password_register animationTop">
                            <label class="d-block fs-4 mt-4 mb-3" for="phone">Điện thoại <span class="color-red fs-3">*</span></label>
                            <input class="border rounded-2 w-100 p-3 fs-4" type="text" pattern="^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$" name="phone" id="phone " required placeholder="Nhập số điện thoại">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="email_register animationTop delay-01">
                            <label class="d-block fs-4 mt-5 mb-3" for="username">Tên đăng nhập <span class="color-red fs-3">*</span></label>
                            <input class="border rounded-2 w-100 p-3 fs-4" type="text" name="username" id="username " required placeholder="Tên đăng nhập hoặc email">
                        </div>

                        <div class="password_register field create-password animationTop delay-01">
                            <div class="input-field">
                                <label class="d-block fs-4 mt-4 mb-3" for="password">Mật khẩu <span class="color-red fs-3">*</span></label>
                                <div class='d-flex justify-content-between align-items-center'>
                                <input class="border rounded-2 w-100 p-3 fs-4 password_logup" type="password" name="password" id="password " required placeholder="Mật khẩu">
                                <i class="bx bx-hide show-hide"></i>
                                </div>
                                
                            </div>
                            <div class="error password-error">
                                <i class="bx bx-error-circle error-icon"></i>
                                <p class="error-text m-0">Vui lòng nhập mật khẩu tối thiểu 8 ký tự</p>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .register-other img {
                        width: 150px;

                    }
                </style>
                <div class="button-hover mt-5 ">
                    <button class="fs-4" name='dangky' type='submit'> Đăng ký</button>
                    <a class="ms-5 link-hover" href="?option=customer&f=login">Đăng nhập</a>
                </div>
                <div class="register-other mt-5  w-100 m-auto">
                    <p class="text-center fs-4">Hoặc Đăng nhập bằng</p>
                    <div class="other-content d-flex justify-content-center ">
                        <div class="other-item-facebook me-3">
                            <a href=""><img class="" src="https://bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg" alt=""></a>

                        </div>
                        <div class="other-item-google ">
                            <a href=""><img class="" src="https://bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg" alt=""></a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-md-6">

            </div>

            </form>
        </div>
</div>
</div>

</div>


</section>
</div>


<?php require_once('views/frontend/footer.php') ?>