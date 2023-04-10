
<?php
require_once('vendor/autoload.php');
require_once('config/database.php');

use App\Models\User;
if(isset($_POST['dangnhap']))
{
  $username = $_POST['username'];
  $password =sha1($_POST['password']);
  if(filter_var($username,FILTER_VALIDATE_EMAIL))
  {
    $args = [
      ['email', '=', $username],
      ['password', '=', $password],
      ['roles', '=', 0],
      ['status', '=', 2]
    ];

  }
  else{
    $args = [
      ['username', '=', $username],
      ['password', '=', $password],
      ['roles', '=', 0],
      ['status', '=', 2]
    ];
  }
  $row = User::where($args)->first();
  if($row!=null)
  {
    
      $_SESSION['usersiter'] = $username;
      $_SESSION['name'] = $row->name;
      $_SESSION['user_id'] = $row->id;
      $_SESSION['image'] = $row->image;
      $_SESSION['cover_image'] = $row->cover_image;
      $_SESSION['created_at'] =date_format($row->created_at," d/m/Y ") ;
      $_SESSION['phone'] = $row->phone;
      $_SESSION['address'] = $row->address;
      $_SESSION['email'] = $row->email;
      $_SESSION['success']='Đăng nhập thành công';
      header('location:index.php');

  }
  else{
    $_SESSION['messenger']='Tài khoản hoặc mật khẩu không chính xác';
  }
}
  
?>

<?php require_once('views/frontend/header.php') ?>

<div class="container mt-5">
      <div class="breadcrumb">
        <ul class="d-flex">
          <li class="">
            <a class="me-md-3 me-1"  href="index.php">Trang chủ</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li class="">Đăng nhập tài khoản</li>
        </ul>
      </div>
      <h1 class="text-center color-red fw-bold">Đăng nhập tài khoản</h1>
      <section class="my-5">
        <div class="row">
          <div class="col-md-6">
            <h3 class="fw-500 text-uppercase">Đăng nhập tài khoản</h3>
            <p class="my-5 fs-4">Nếu bạn đã có tài khoản đăng nhập ở đây</p>
            <div class="form-login">
              <form action="" method="post">
                <div class="email_login mb-2" >
                  <label class="d-block fs-4 mt-5 mb-3 "   for="email">Tên đăng nhập *</label>
                  <input type="text" name="username" id="username" placeholder="Tên đăng nhập hoặc email" required>
                </div>
                <?php if(isset($_SESSION['messenger'])): ?>
                  <?php
                    $error =$_SESSION['messenger'];
                    unset($_SESSION['messenger']) ?>
                  <span class='ms-2 fs-5 text-danger'><?=$error?></span>
                  <?php endif; ?>
                <div class="password_login" >
                  <label class="d-block fs-4 mt-4 mb-3" for="password">Mật khẩu *</label>
                  <input type="password" name="password" id="password " required placeholder="Mật khẩu">
                </div>
                <div class="button-hover mt-5">
                  <button name="dangnhap" class="fs-4"> Đăng nhập</button>
                  <a class="ms-5 link-hover" href="?option=customer&f=logup">Đăng ký</a>
                </div>
                <div class="login-other mt-5">
                  <p class="text-center fs-4">Đăng nhập bằng</p>
                  <div class="other-content d-flex justify-content-center">
                    <div class="other-item-facebook w-25 me-3">
                      <a href=""><img class="w-100" src="https://bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg" alt=""></a>
                    
                    </div>
                    <div class="other-item-google w-25">
                      <a href=""><img class="w-100" src="https://bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg" alt=""></a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6 mt-5">
            <h3 class="fw-500 fs-4 mt-5 fw-semibold">Bạn quyên mật khẩu ?</h3>
            <p class="mb-md-5 mb-3 fs-5">Nhập địa chỉ email để lấy lại mật khẩu qua email.</p>
            <div class="form-login-reset">
              <form action="" method="post">
                <div class="row">
                  <div class="col-md-7">
                    <div class="email_login" >
                      <label class="d-block fs-4 my-3" for="email">Email *</label>
                      <input type="email" name="email" required id="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="col-md mt-md-0 mt-4 text-center">
                    <div class="btn-reset-password button-hover">
                      <button>Lấy lại mật khẩu</button>
                    </div>
                  </div>
                </div>
                
                
              </form>
            </div>
          </div>
          </div>
          
        </div>
        

      </section>
      
    </div>
<?php require_once('views/frontend/footer.php') ?>



