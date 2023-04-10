<?php require_once('views/frontend/header.php'); ?>

<?php

use App\Models\Contact;
use App\Models\Post;

$slug = $_REQUEST['cat'];
$page = Post::where([['status', '=', 1], ['type', '=', 'page'], ['slug', '=', $slug]])->first();
$list_page = Post::where([['status', '=', '1'], ['type', '=', 'page'], ['slug', '!=', $slug]])->orderBy('created_at', 'desc')->take(10)->get();
$title = $page['title'];

$cat = $_REQUEST['cat'];
if (isset($_POST['gui'])) {
    $contact = new Contact();
    $contact->name = $_POST['name'];
    $contact->phone = $_POST['phone'];
    $contact->email = $_POST['email'];
    $contact->title = $_POST['title'];
    $contact->detail = $_POST['detail'];
    $contact->status = 1;
    $contact->created_at = date('Y-m-d H:i:s');
    $contact->updated_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
    $contact->save();
}
?>

<div class="container my-5">
    <div class="breadcrumb">
        <ul class="d-flex p-0">
            <li class="">
                <a class="me-md-3 me-1" href="#">Trang chủ</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li class="">Tin tức</li>
        </ul>
    </div>
    <h3 class="text-uppercase"><?= $title ?></h3>
    <?php if ($cat == 'lien-he') : ?>
        <?= $page->detail ?>
        <form action="index.php?option=page&cat=lien-he" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Họ Tên</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Họ tên">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tiêu đề</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Điện thoại</label>
                <input type="number" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Điện thoại">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Ghi chú</label>
                <textarea class="form-control" name="detail" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button class="btn bg-danger text-white" type="submit" name="gui">Gửi</button>
        </form>

    <?php else : ?>
        <p>
            <?= $page->detail ?>
        </p>
    <?php endif; ?>
</div>
<?php require_once('views/frontend/footer.php'); ?>