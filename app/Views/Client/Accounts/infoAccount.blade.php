@extends('Layout.user')
@section('content')
<div class="box-userInfo">
    <div class="box-userInfo-header">
        <h3>Hồ sơ của tôi</h3>
        <p>Quản lí thông tin hồ sơ để bảo mật tài khoản</p>
    </div>
    <div class="box-userInfo-content">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="box-userInfo-content-left">
                <table class="table">
                    <tr>
                        <td>Tên đăng nhập</td>
                        <td>
                            <?php if(isset($infoUser['username'])) echo $infoUser['username'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <?php if(isset($infoUser['email'])) echo $infoUser['email'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Họ và tên</td>
                        <td>
                            <?php if(isset($infoUser['fullname'])) echo $infoUser['fullname'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Giới tính</td>
                        <td>
                            <?php
                                $gender = '';
                                if(($infoUser['gender']=='male')) {
                                    $gender = 'Nam';
                                } else if($infoUser['gender']=='female'){
                                    $gender = 'Nữ';
                                }else if($infoUser['gender']=='other'){
                                    $gender = 'Khác';
                                }
                                echo $gender;
                            ?>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>Ngày sinh</td>
                        <td>
                            <?php if(($infoUser['dob']!='0000-00-00')) echo $infoUser['dob'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>
                            <?php if(isset($infoUser['tel'])) echo $infoUser['tel'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td>
                            <?php if((isset($infoUser['address']))&&($infoUser['address']!="")) echo $infoUser['address'] ?>
                        </td>
                    </tr>
                </table>
                <a class="btn p-0" href="{{route('/editInfo')}}"><span name="btnInfo" class="btn btn-success">Thay
                        đổi thông tin</span></a>
                <a class="btn p-0" href="{{route('/changePass')}}"><span name="btnInfo" class="btn btn-success">Đổi
                        mật khẩu</span></a>
            </div>
            <div class="box-userInfo-content-right">
                <div class="box-userInfo-content-right-img">
                    <img src="<?php
                    if ((!isset($infoUser['avatar'])) || ($infoUser['avatar'] == ""))
                        echo pathUpload('user.jpg');
                    else
                        echo pathUpload(''.$infoUser['avatar']);
                    ?>" alt="" id="userInfo-avatar" />
                </div>
            </div>
        </form>
    </div>
</div>
<?php
if (isset($_COOKIE['successChange'])) {
    echo '<script>';
    echo 'Swal.fire({
        title: "Thành công!",
        text: "Thay đổi mật khẩu thành công!",
        icon: "success"
    });';
    echo '</script>';
}
if (isset($_COOKIE['editInfo'])) {
    echo '<script>';
    echo 'Swal.fire({
        title: "Thành công!",
        text: "Thay đổi thông tin tài khoản thành công!",
        icon: "success"
    });';
    echo '</script>';
}
?>
@endsection
