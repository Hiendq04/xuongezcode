@extends('Layout.user')
@section('content')
<div class="forgot">
    <div class="formForgot ">
        <h2>Quên mật khẩu</h2>
        <form action="" id="form_logup" method="Post">
            <div><input type="text" placeholder="Email khôi phục" name="email" class="mb20">
                <p class="errUser"></p>
            </div>
            <input type="submit" name="btn_send" value="Gửi">
        </form>
        <div class="more">
            <a href="{{route('/login')}}">Đăng nhập</a>
        </div>
    </div>
</div>
<?php 
    if(isset($_COOKIE['errEmail'])){
        echo '<script>';
        echo 'Swal.fire({
                title: "Lỗi!",
                text: "Email không tồn tại!",
                icon: "warning",
            });';
        echo '</script>';
    }
    if(isset($_SESSION['sendSucces'])){
        echo '<script>';
        echo 'Swal.fire({
                    title: "Thành công!",
                    text: "Mã xác thực đã được gửi!",
                    icon: "success",
                }).then((result) => {
                    if (result.isConfirmed) {
                    window.location.href = "'.$link.'";
                }
            }); ';
        echo '</script>';
        unset($_SESSION['sendSucces']);
    }
?>
@endsection