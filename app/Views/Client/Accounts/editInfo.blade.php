@extends('Layout.user')
@section('content')
<div class="box_editUserInfo box-userInfo">
    <div class="box-userInfo-header">
        <h3>Chỉnh sửa hồ sơ</h3>
        <p>Chỉnh sửa thông tin tài khoản</p>
    </div>
    <div class="box-userInfo-content">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="box-userInfo-content-left">
                <table class="table">
                        <tr>
                            <td style="min-width: 150px;">Tên đăng nhập</td>
                            <td><input type="text" id="user" name="username" value="<?php if (isset($infoUser['username']))
                            echo $infoUser['username'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Họ và tên</td>
                            <td><input type="text" id="full_name" name="fullname" value="<?php if (isset($infoUser['fullname']))
                            echo $infoUser['fullname'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Giới tính</td>
                            <td class="gender-row">
                                <label class="gender-label"><input type="radio" name="gender" value="male" <?php if (isset($infoUser['gender']) && $infoUser['gender'] == 'male') echo 'checked'; ?>> <span>Nam</span></label>
                                <label class="gender-label"><input type="radio" name="gender" value="female" <?php if (isset($infoUser['gender']) && $infoUser['gender'] == 'female') echo 'checked'; ?>> <span>Nữ</span></label>
                                <label class="gender-label"><input type="radio" name="gender" value="other" <?php if (isset($infoUser['gender']) && $infoUser['gender'] == 'other') echo 'checked'; ?>> <span>Khác</span></label>
                            </td>
                        </tr>
                        <tr>
                        <td>Ngày sinh</td>
                        <td><input type="date" id="dob" name="dob" value="<?php if (isset($infoUser['dob']))
                            echo $infoUser['dob'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input disabled type="text" id="email" name="email" value="<?php if (isset($infoUser['email']))
                            echo $infoUser['email'] ?>" /></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td><input type="text" id="tel" name="tel" value="<?php if (isset($infoUser['tel']))
                            echo $infoUser['tel'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input  type="text" id="address" name="address" value="<?php if (isset($infoUser['address']))
                            echo $infoUser['address'] ?>"></td>
                        </tr>           
                </table>
                    <input type="text" hidden id="iduser" value="<?= $infoUser['id'] ?>">
                    <button type="submit" name="btn-editInfo" id="btn-editInfor" class="btn btn-success">Lưu thông
                    tin</button>
                <a href="{{route('/infoAccount')}}" class="btn"><button type="button"
                        class="btn btn-secondary">Hủy</button></a>
            </div>
            <div class="box-userInfo-content-right">
                <div class="box-userInfo-content-right-img">
                    <img src="<?php
                    if ((!isset($infoUser['avatar'])) || ($infoUser['avatar'] == ""))
                        echo pathUpload('user.jpg');
                    else
                        echo pathUpload(''.$infoUser['avatar']);
                    ?>?>" alt="" id="userInfo-avatar" />
                    <label for="changeFile"><i class="fa-solid fa-pen-to-square"></i></label>
                    <input type="file" class="imageUser" name="avatar" id="changeFile"
                        onchange="chooseFile(this,'userInfo-avatar')">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
