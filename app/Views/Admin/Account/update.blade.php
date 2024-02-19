@extends('Layout.admin')
@section('content')

<form action="" method="post" enctype="multipart/form-data">
    <div class="addAcc row mt-5 px-5">
        <div class="col-5 addAcc-img">
            <div>
                <label for="formFile"><img id="img-add-acc" src="<?php
                    if ((!isset($account['avatar'])) || ($account['avatar'] == ""))
                        echo pathUpload ('user.jpg');
                    else
                        echo pathUpload($account['avatar']);
                    ?>" alt="" class="rounded-circle width:100%;"></label>
            </div>
            <div class="my-3">
                <input class="form-control" type="file" name="avatar" onchange="chooseFile(this,'img-add-acc')"
                    id="formFile">
            </div>
        </div>
        <div class="col-7 addAcc-acc">
            <div class="addAcc-acc-show">
                <div class="title">
                    <h2>Cập nhật thông tin tài khoản: </h2>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Tên đăng nhập</span>
                        <input type="text" class="form-control" value="<?php echo $account['username'] ?>" require
                            name="username" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Tên</span>
                        <input type="text" class="form-control" value="<?php echo $account['fullname'] ?>" require
                            name="fullname" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Email</span>
                        <input <?php if($account['email']!='' ) echo 'readonly' ?> type="text" class="form-control"
                        value="
                        <?php echo $account['email'] ?>" require
                        name="email" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Số điện thoại</span>
                        <input type="text" class="form-control" value="<?php echo $account['tel'] ?>" require name="tel"
                            id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Ngày sinh</span>
                        <input style="text-transform: uppercase;" type="date" class="form-control"
                            value="<?php echo $account['dob'] ?>" require name="dob" id="basic-url"
                            aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Giới tính</span>
                        <span type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                            <label class="gender-label ms-4 me-5">
                                <input type="radio" name="gender" value="male" <?php if (isset($account['gender']) &&
                                    $account['gender']=='male' ) echo 'checked' ; ?>>
                                <span>Nam</span>
                            </label>

                            <label class="gender-label me-5">
                                <input type="radio" name="gender" value="female" <?php if (isset($account['gender']) &&
                                    $account['gender']=='female' ) echo 'checked' ; ?>>
                                <span>Nữ</span>
                            </label>

                            <label class="gender-label">
                                <input type="radio" name="gender" value="other" <?php if (isset($account['gender']) &&
                                    $account['gender']=='other' ) echo 'checked' ; ?>>
                                <span>Khác</span>
                            </label>
                        </span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Địa chỉ</span>
                        <input type="text" class="form-control" value="<?php echo $account['address'] ?>" require
                            name="address" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Vai trò</span>
                        <select name="role" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                            <option value="admin" <?php if ($account['role']=='admin' ) echo "selected" ; ?>>
                                <?php echo "Quản trị viên" ?>
                            </option>
                            <option value="client" <?php if ($account['role']=='client' ) echo "selected" ; ?>>
                                <?php echo "Khách hàng" ?>
                            </option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Trạng thái</span>
                        <select name="status" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                            <?php
                                if ($account['status'] == 'active') {
                                    echo "
                                        <option value='active' selected>Hoạt động</option>
                                        <option value='inactive'>Khóa</option>";
                                } else if ($account['status'] == 'inactive') {
                                    echo "
                                        <option value='active'>Mở khóa</option>
                                        <option value='inactive' selected >Đã khóa</option>";
                                } else {
                                    echo "
                                        <option value='0' selected hidden>Chọn</option>
                                        <option value='active'>Hoạt động</option>
                                        <option value='inactive'>Khóa</option>";
                                }
                                ?>
                        </select>
                    </div>
                    <?php
                        if (isset($account['update_at'])&&$account['update_at']!='0000-00-00') {
                            echo '<div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">Lần cập nhật gần nhất</span>
                                <input readonly type="text" class="form-control" value="' . $account['update_at'] . '" require name="" id="basic-url" aria-describedby="basic-addon3">
                            </div>';
                        }
                        ?>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success" name="btn_update-acc" value="Cập nhật">
                        <a onclick="return confirmNavigate();" class="btn p-0" style="z-index: 1000;" href="#">
                            <span class="btn btn-secondary">Hủy</span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
<script>
    function confirmNavigate() {
        var confirmation = confirm('Bạn chắc chắn muốn hủy không ?');
        
        if (confirmation) {
            history.back();
        }

        return false;
    }
</script>

@endsection