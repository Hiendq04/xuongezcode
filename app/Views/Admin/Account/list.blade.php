@extends('Layout.admin')
@section('content')

    <form class="input-group mb-3" method="post">
        <input type="text" class="form-control" name="keyword" placeholder="Nhập tên tài khoản hoặc email muốn tìm kiếm"
            aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="submit" name="btn-search" id="button-addon2">Tìm kiếm</button>
        <button class="btn btn-outline-secondary" type="submit" name="btn-all" id="button-addon2">Tất cả tài
            khoản</button>
    </form>
    <form action="" method="post">
        <table class="table-hung table_account">
            <thead>
                <tr class="table-hung-th">
                    <th><input type="checkbox" id="checkAll"></th>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên đăng nhập</th>
                    <th>Email</th>
                    <th hidden>Mã cv</th>
                    <th style="position: relative;">
                        Chức vụ
                        <i class="fa-solid fa-caret-down"></i>
                        <select id="selectRole" style="position: absolute;right: 25px;opacity: 0;" name="">
                            <option value="0">Tất cả</option>
                            <option value="admin">Quản trị viên</option>
                            <option value="client">Khách hàng</option>
                        </select>
                    </th>
                    <th style="position: relative;">
                        Trạng thái
                        <i class="fa-solid fa-caret-down"></i>
                        <select id="selectStatus" style="position: absolute;right:25px;opacity: 0;" name="">
                            <option value="0">Tất cả</option>
                            <option value="active">Hoạt động</option>
                            <option value="inactive">Đã khóa</option>
                        </select>
                    </th>
                    <th hidden>Mã status</th>
                    <th>Thao tác</th>
                    <!-- <th></th> -->
                </tr>
            </thead>

            <tbody id="body-listUser">
                <?php $i = 1;?>
                @foreach($accounts as $acc)
                <tr class="trListAccount">
                <?php $idAcc = $acc['id'] ?>
                    <td><input type="checkbox" name="checkVou<?= $acc['id'] ?>" value="<?= $acc['id'] ?>"
                            class="checkbtn" id=""></td>
                    <td>{{$i++}}</td>
                    <td>{{$acc['id']}}</td>
                    <td><a style="text-decoration: none;color: black;" href="{{routeAdmin('/accounts/info/'.$idAcc)}}">{{$acc['username']}}</a></td>
                    <td>{{$acc['email']}}</td>
                    <td hidden class="roleId">{{$acc['role']}}</td>
                    <td>
                        <?php
                            if ($acc['role'] == 'admin') echo "<span style='color:blue;'>Quản trị viên</span>";
                            else if ($acc['role'] == 'client') echo "Khách hàng";
                            ?>
                    </td>
                    <td>
                        <?php
                            if ($acc['status'] == 'active') echo "<span style='color:green;'>Hoạt động</span>";
                            else if ($acc['status'] == 'inactive') echo "<span style='color:red;'>Đã khóa</span>";
                            ?>
                    </td>
                    <td hidden class="statusId">{{$acc['status']}}</td>
                    <td>
                        <a class="btn btn-info" href="{{routeAdmin('/accounts/edit/'.$idAcc)}}">Sửa</a> 
                        <a class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn tài khoản này?')"
                            href="{{routeAdmin('/accounts/delete/'.$idAcc)}}">Xóa</a>
                    </td>
                    <!-- <td><a href=""><i class="fa-solid fa-circle-info"></i></a></td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="btn_property d-flex justify-content-center mt-3 mb-4">
            <input type="submit" name="btn-unlock-a" class="btn btn-outline-dark mx-2"
                value="Mở khóa tất cả tài khoản đã chọn"
                onclick="return confirm('Bạn chắc chắn muốn mở khóa các tài khoản đã chọn ?')">
            <input type="submit" name="btn-lock-a" class="btn btn-outline-dark me-2" value="Khóa các tài khoản đã chọn"
                onclick="return confirm('Bạn chắc chắn muốn khóa các tài khoản đã chọn ?')">
            <input type="submit" name="btn-deletes-a" class="btn btn-outline-dark" value="Xóa tất cả ô đã chọn"
                onclick="return confirm('Bạn chắc chắn muốn xóa các tài khoản đã chọn ?')">
        </div>
    </form>
    <?php 
        if(isset($_COOKIE['deletes'])){
            echo '<script>';
            echo 'Swal.fire({
                title: "Thành công!",
                text: "Xóa nhiều tài khoản thành công!",
                icon: "success"
            });';
            echo '</script>';
        }
        if(isset($_SESSION['delete'])){
            echo '<script>';
            echo 'Swal.fire({
                title: "Thành công!",
                text: "Xóa tài khoản thành công!",
                icon: "success"
            });';
            echo '</script>';
            unset($_SESSION['delete']);
        }
        if(isset($_COOKIE['lock'])){
            echo '<script>';
            echo 'Swal.fire({
                title: "Thành công!",
                text: "Khóa nhiều tài khoản thành công!",
                icon: "success"
            });';
            echo '</script>';
        }
        if(isset($_COOKIE['unlock'])){
            echo '<script>';
            echo 'Swal.fire({
                title: "Thành công!",
                text: "Mở khóa nhiều tài khoản thành công!",
                icon: "success"
            });';
            echo '</script>';
        }
    ?>
    <script>
    // Chọn tất cả ô check
    let listInput = document.querySelectorAll(".checkbtn");
    let inputAll = document.getElementById("checkAll");
    inputAll.addEventListener("change", function() {
        if (inputAll.checked) {
            for (let i = 0; i < listInput.length; i++) {
                listInput[i].checked = true;
            }
        } else {
            for (let i = 0; i < listInput.length; i++) {
                listInput[i].checked = false;
            }
        }
    });

    let bodyTable = document.getElementById("body-listUser");
    let selectRole = document.getElementById("selectRole");
    let selectStatus = document.getElementById("selectStatus");
    let trListAccount = document.querySelectorAll(".trListAccount");


    // function locSp(select, list, classdk, view) {
    //     select.onchange = function() {
    //         let htmlText = '';
    //         for (let i = 0; i < list.length; i++) {
    //             let inp = list[i].querySelector(classdk).innerText;
    //             if (inp == select.value || select.value == 0) {
    //                 htmlText += list[i].outerHTML;
    //             }
    //         }
    //         view.innerHTML = htmlText;
    //     }
    // }


    // locSp(selectRole, trListAccount, ".roleId", bodyTable);
    // locSp(selectStatus, trListAccount, ".statusId", bodyTable);


    function locSp(selectRole, selectStatus, list, classRole, classStatus, view) {
        selectRole.onchange = selectStatus.onchange = function() {
            let htmlText = '';
            for (let i = 0; i < list.length; i++) {
                let role = list[i].querySelector(classRole).innerText;
                let status = list[i].querySelector(classStatus).innerText;

                if ((role == selectRole.value || selectRole.value == 0) &&
                    (status == selectStatus.value || selectStatus.value == 0)) {
                    htmlText += list[i].outerHTML;
                }
            }
            view.innerHTML = htmlText;
        }
    }

    locSp(selectRole, selectStatus, trListAccount, ".roleId", ".statusId", bodyTable);
    </script>

@endsection
