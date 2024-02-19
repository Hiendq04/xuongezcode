@extends('Layout.user')
@section('content')
<div style="height:20px"></div>
<div class="signUp changePass">
    <h2>Đổi mật khẩu</h2>

    <form action="" id="formChangePass" method="post">
        <div>
            <input type="password" name="pass" id="oldPass" placeholder="Mật khẩu cũ">
            <div class="icon icon0"><i class="fa-solid fa-eye"></i></div>
            <p class="err errOldPass">Bao gồm 8 kí tự gồm chữ cái, kí tự đặc biệt và số</p>
        </div>
        <div>
            <input type="password" name="newPass" id="newPass" placeholder="Mật khẩu mới">
            <div class="icon icon1"><i class="fa-solid fa-eye"></i></div>
            <p class="err errNewPass1">Ít nhất 8 kí tự gồm chữ cái, kí tự đặc biệt và số</p>
            <p class="err errNewPass2">Không trùng với mật khẩu cũ</p>
        </div>
        <div>
            <input type="password" name="repass" id="reNewPass" placeholder="Xác nhận mật khẩu">
            <div class="icon icon2"><i class="fa-solid fa-eye"></i></div>
            <p class="err errReNewPass">Mật khẩu trùng khớp</p>
        </div>
        <input type="submit" id="btn_sub" name="btn-changePass" value="Thay đổi">
    </form>
    <div class="more">
        <a href="{{route('/infoAccount')}}">Quay lại trang thông tin</a>
    </div>
</div>
<div style="height:5px"></div>
<?php 
    if(isset($_COOKIE['errChange'])){
        echo '<script>';
        echo 'Swal.fire({
            title: "Lỗi!",
            text: "Mật khẩu sai!",
            icon: "warning"
        });';
        echo '</script>';
        }
?>
<script>
    function validate(input, error, condition, callback) {
        input.addEventListener('input', function() {
            let val = input.value;
            let check = condition(val);
            if (check) {
                error.style.color = "green";
            } else {
                error.style.color = "red";
            }
            callback(check);
        });
    }

    let checkOldPass = false;
    let checkNewPass1 = false;
    let checkNewPass2 = false;
    let checkReNewPass = false;

    validate(document.querySelector("#oldPass"), document.querySelector(".errOldPass"), function(value) {
        return /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
    }, function(check) {
        checkOldPass = check;
    });
    

    
    validate(document.querySelector("#newPass"), document.querySelector(".errNewPass1"), function(value) {
        return /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
    }, function(check) {
        checkNewPass1 = check;
    });

    let newPass = document.querySelector("#newPass");
    let errNewPass2 = document.querySelector(".errNewPass2");
    validate(newPass, errNewPass2, function() {
        return newPass.value !== document.querySelector("#oldPass").value;
    }, function(check) {
        checkNewPass2 = check;
    });

    let reNewPass = document.querySelector("#reNewPass");
    let errReNewPass = document.querySelector(".errReNewPass");

    validate(reNewPass, errReNewPass, function() {
        return reNewPass.value === document.querySelector("#newPass").value;
    }, function(check) {
        checkReNewPass = check;
    });


    // Ẩn hiện pass

    let inOldPass = document.querySelector("#oldPass");
    document.querySelector(".icon0").onclick = function() {
        if (inOldPass.type == "password") inOldPass.type = "text";
        else inOldPass.type = "password";
    }
    let inNewPass = document.querySelector("#newPass");
    document.querySelector(".icon1").onclick = function() {
        if (inNewPass.type == "password") inNewPass.type = "text";
        else inNewPass.type = "password";
    }

    let inReNewPass = document.querySelector("#reNewPass");
    document.querySelector(".icon2").onclick = function() {
        if (inReNewPass.type == "password") inReNewPass.type = "text";
        else inReNewPass.type = "password";
    }


    // let formChangePass = document.querySelector("#formChangePass");
    // formChangePass.onsubmit = function(e) {
    //     e.preventDefault();
    //     if (checkOldPass && checkNewPass1 && checkNewPass2 && checkReNewPass) {
    //         formChangePass.submit();
    //     }
    // }

</script>
@endsection
