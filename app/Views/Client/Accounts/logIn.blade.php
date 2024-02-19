@extends('Layout.user')
@section('content')
<div class="signIn">
    <h2>Đăng nhập</h2>
    <form action="" id="form_logup" method="Post">
        <div><input type="text" placeholder="Tên đăng nhập/Email/Số điện thoại" name="tendn" id="username" class="mb20">
            <p class="errUser"></p>
        </div>
        <div>
            <input class="password" type="password" name="password" id="pass" placeholder="Mật khẩu">
            <div class="icon"><i class="fa-solid fa-eye"></i></div>
        </div>
        <a href="{{route('/forgot')}}">Quên mật khẩu</a>
        <input type="submit" name="btn_signIn" value="Đăng nhập">
    </form>
    <div class="more">
        Bạn chưa có tài khoản?
        <a href="<?= route('/signup') ?>">Đăng ký</a>
    </div>
    
</div>
<?php 
    if(isset($_SESSION['err1'])){
        echo '<script>';
        echo 'Swal.fire({
                title: "Lỗi!",
                text: "Vui lòng điền đầy đủ các trường thông tin!",
                icon: "warning",
            });';
        echo '</script>';
        unset($_SESSION['err1']);
    }
    if(isset($_SESSION['signUpSucc'])){
        echo '<script>';
        echo 'Swal.fire({
                title: "Thành công!",
                text: "Hoàn tất đăng kí!",
                icon: "success",
            });';
        echo '</script>';
        unset($_SESSION['signUpSucc']);
    }
    if(isset($_COOKIE['errU'])){
        echo '<script>';
        echo 'Swal.fire({
                title: "Lỗi!",
                text: "Tài khoản không tồn tại!",
                icon: "warning",
                timer: 1500
            });';
        echo '</script>';
    }
    if(isset($_COOKIE['locked'])){
        echo '<script>';
        echo 'Swal.fire({
                title: "Lỗi!",
                text: "Tài khoản của bạn đã bị khóa!",
                icon: "warning",
                timer: 1500
            });';
        echo '</script>';
    }
    if(isset($_COOKIE['errP'])){
        echo '<script>';
        echo 'Swal.fire({
                title: "Lỗi!",
                text: "Sai mật khẩu đăng nhập!",
                icon: "warning",
                timer: 1500
            });';
        echo '</script>';
    }
    if(isset($_SESSION['updatePass'])){
        echo '<script>';
        echo 'Swal.fire({
                title: "Thành công!",
                text: "Thay đổi mật khẩu thành công!",
                icon: "success",
            });';
        echo '</script>';
        unset($_SESSION['updatePass']);
    }
    if(isset($_SESSION['errToken'])){
        echo '<script>';
        echo 'Swal.fire({
                    title: "Lỗi!",
                    text: "Mã xác nhận không trùng khớp!",
                    icon: "warning",
                }).then((result) => {
                    if (result.isConfirmed) {
                    window.history.back();
                }
            }); ';
        echo '</script>';
        unset($_SESSION['errToken']);
    }
?>
<script>
    let inPass = document.querySelector(".password");
    document.querySelector(".icon").onclick = function() {
        if (inPass.type == "password") inPass.type = "text";
        else inPass.type = "password";
    }
</script>
@endsection
