@extends('Layout.admin')
@section('content')

    <form action="" method="post" enctype="multipart/form-data">
        <div class="addAcc row mt-5 px-5">
            <div class="col-5 addAcc-img">
                <div>
                    <label src="" for="formFile"><img src="data:image/jpeg;base64,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" id="img-add-acc" alt="" class="rounded-circle width:100%;"></label>
                </div>
                <div class="my-3">
                    <input class="form-control" type="file" name="avatar" onchange="chooseFile(this,'img-add-acc')" id="formFile">
                </div>
            </div>
            <div class="col-7 addAcc-acc">
                <div class="addAcc-acc-show">
                    <div class="title">
                        <h2>Thông tin tài khoản: </h2>
                        <h6>(<span style="color:red">*</span>)Trường thông tin bắt buộc.</h6>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Tên đăng nhập<span style="color:red">*</span></span>
                            <input type="text" class="form-control user" placeholder="abc123" require name="username" aria-describedby="basic-addon3">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Tên</span>
                            <input type="text" class="form-control name" placeholder="Nguyễn Văn A" require name="fullname" aria-describedby="basic-addon3">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Giới tính</span>
                            <span type="text" class="form-control"  id="basic-url" aria-describedby="basic-addon3">
                                <input type="text" name='gender' hidden>
                                <label class="gender-label ms-4 me-5">
                                    <input type="radio" name="gender" value="male">
                                    <span>Nam</span>
                                </label>

                                <label class="gender-label me-5">
                                    <input type="radio" name="gender" value="female">
                                    <span>Nữ</span>
                                </label>
                                <label class="gender-label">
                                    <input type="radio" name="gender" value="other">
                                    <span>Khác</span>
                                </label>
                            </span>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Ngày sinh</span>
                            <input style="text-transform: uppercase;" type="date" class="form-control name" require name="dob" aria-describedby="basic-addon3">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Email<span style="color:red">*</span></span>
                            <input type="text" class="form-control email" placeholder="nguyenvana@gmail.com" require name="email" aria-describedby="basic-addon3" >
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Số điện thoại</span>
                            <input type="text" class="form-control tel" placeholder="0123456789" require name="tel" aria-describedby="basic-addon3">
                        </div>
                        <div class="input-group mb-3" style="position: relative;">
                            <span class="input-group-text" id="basic-addon3">Mật khẩu<span style="color:red">*</span></span>
                            <input type="password" class="form-control pass" min="0" step="5" placeholder="Chứa 8-16 kí tự gồm chữ cái, kí tự đặc biệt và số" require name="password" aria-describedby="basic-addon3">
                            <div class="iconPass"><i class="fa-solid fa-eye"></i></div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Địa chỉ</span>
                            <input type="text" class="form-control address" min="0" step="5" placeholder="Nhập địa chỉ người dùng" require name="address" aria-describedby="basic-addon3">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Vai trò<span style="color:red">*</span></span>
                            <select name="role" class="form-control role" aria-describedby="basic-addon3">
                                <option value="0" hidden>Chọn</option>
                                <option value="admin"><?php echo "Quản trị viên" ?></option>
                                <option value="client"><?php echo "Khách hàng" ?></option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input type="submit" class="btn btn-success form-control" name="btn_add-acc" value="Thêm tài khoản">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </form>
    <?php 
        if(isset($_SESSION['err1'])){
            echo '<script>';
            echo 'Swal.fire({
                title: "Lỗi!",
                text: "Vui lòng nhập đầy đủ các thông tin bắt buộc!",
                icon: "error"
            });';
            echo '</script>';
            unset($_SESSION['err1']);
        }
        if(isset($_SESSION['success'])){
            echo '<script>';
            echo 'Swal.fire({
                title: "Thành công!",
                text: "Thêm tài khoản thành công!",
                icon: "success"
            });';
            echo '</script>';
            unset($_SESSION['success']);
        }
    ?>
<script>
    let inPass = document.querySelector(".pass");
    let iconPass = document.querySelector(".iconPass");
    iconPass.onclick = function() {
        if (inPass.type == "password") {
            inPass.type = "text";
            iconPass.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
        }
        else {
            inPass.type = "password";
            iconPass.innerHTML = '<i class="fa-solid fa-eye"></i>';
        }
    }

    // Validate
    function validate(input, condition, callback) {
        input.addEventListener('input', function() {
            let val = input.value;
            let check = condition(val);
            callback(check);
        });
    }
    let checkUser = false;
    let checkEmail = false;
    let checkPass = false;
    let checkName = false;
    let checkTel = false;
    let checkAddress = false;
    let checkRole = false;

    validate(document.querySelector(".user"),function(value) {
        return /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/.test(value);
    }, function(check) {
        checkUser = check;
    });

    validate(document.querySelector(".name"),function(value) {
        return /^[a-zA-Z\sàáạảãăắằẳẵặâấầẩẫậèéẹẻẽêếềểễệđìíịỉĩòóọỏõôốồổỗộơớờởỡợùúụủũưứừửữựỳỹỷỵ]+$/.test(value);
    }, function(check) {
        checkName = check;
    });
    validate(document.querySelector(".email"),function(value) {
        return /^[a-zA-Z0-9._-]+@gmail\.com$/.test(value);
    }, function(check) {
        checkEmail = check;
    });
    validate(document.querySelector(".tel"),function(value) {
        return /^0\d{9}$/.test(value);
    }, function(check) {
        checkTel = check;
    });
    validate(document.querySelector(".pass"),function(value) {
        return /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/.test(value);
    }, function(check) {
        checkPass = check;
    });
    validate(document.querySelector(".address"),function(value) {
        return /^[\p{L}0-9\s,\/]+$/u.test(value);
    }, function(check) {
        checkAddress = check;
    });

    let role = document.querySelector(".role");
    role.addEventListener('input', function() {
        let check = false;
        if(role.value==1&&role.value==2) return check = true;
    });
    console.log(checkRole)
    console.log(role.value)
    

</script>

@endsection
