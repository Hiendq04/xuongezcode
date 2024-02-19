@extends('Layout.admin')
@section('content')

    <form action="" method="post">
        <table class="table-hung table_account">
            <thead>
                <tr class="table-hung-th">
                <th><input type="checkbox" id="checkAll"></th>
                <th>STT</th>
                <th>ID</th>
                <th>Người đánh giá</th>
                <th>Khóa học</th>
                <th style="position: relative;">
                        Đánh giá
                        <i class="fa-solid fa-caret-down"></i>
                        <select id="selectRate" style="position: absolute;right: 15px;width: 90px;opacity: 0; " name="">
                            <option value="0">Tất cả</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                </th>
                <th>Ghi chú</th>
                <th>Ảnh</th>
                <th>Ngày thực hiện</th>
                <th>Thao tác</th>
                </tr>
            </thead>

            <tbody id="body-listComment">
                <?php $i = 1;  ?>
                @foreach($rates as $rate)
                    <tr class="trListComment">
                        <td><input type="checkbox" name="checkVou<?= $rate['id'] ?>" value="<?= $rate['id'] ?>" class="checkbtn" id=""></td>
                        <td> {{$i++}} </td>
                        <td> {{$rate['id']}} </td>
                        <td>
                            <?php 
                                    if($rate['username'] == 'Tài khoản không tồn tại!')
                                    {
                                        echo $rate['username'];
                                    }else{
                                        echo "<a style='text-decoration:none;color:black;' href='".routeAdmin('/accounts/info/'.$rate['user_id'])."'>".$rate['username']."</a>";
                                    }
                                ?>
                        </td>
                        <td>
                            <?php 
                                if($rate['course_name'] == 'Khóa học không tồn tại')
                                {
                                    echo $rate['course_name'];
                                }else{
                                    echo "<a style='text-decoration:none;color:black;' href='".routeAdmin('/course/info/'.$rate['course_id'])."'>".$rate['course_name']."</a>";
                                }
                            ?>
                        </td>
                        <td class="classRate" > {{$rate['value']}} </td>
                        <td> {{$rate['note']}} </td>
                        <td> {{$rate['image']}} </td>
                        <td> {{$rate['created_at']}} </td>
                        <td><a class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn đánh giá này?')" href="{{routeAdmin('/rating/delete/'.$rate['id'])}}">Xóa</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="btn_property d-flex justify-content-center mt-3 mb-4">
            <input type="submit" name="btn-deletes-r" class="btn btn-outline-dark" value="Xóa tất cả ô đã chọn" onclick="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn các bình luận đã chọn?')">
        </div>
    </form>
    <?php 
        if(isset($_COOKIE['deletes'])){
            echo '<script>';
            echo 'Swal.fire({
                title: "Thành công!",
                text: "Xóa nhiều đánh giá thành công!",
                icon: "success"
            });';
            echo '</script>';
        }
        if(isset($_SESSION['delete'])){
            echo '<script>';
            echo 'Swal.fire({
                title: "Thành công!",
                text: "Xóa đánh giá thành công!",
                icon: "success"
            });';
            echo '</script>';
            unset($_SESSION['delete']);
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

        let bodyTable = document.getElementById("body-listComment");
        let selectStatus = document.getElementById("selectRate");
        let trListComment = document.querySelectorAll(".trListComment");

        function locSp(selectStatus, list, classStatus, view) {
            selectStatus.onchange = function() {
                let htmlText = '';
                for (let i = 0; i < list.length; i++) {
                    let status = list[i].querySelector(classStatus).innerText;

                    if ((status == selectStatus.value || selectStatus.value == 0)) {
                        htmlText += list[i].outerHTML;
                    }
                }
                view.innerHTML = htmlText;  
            }
        }

        locSp(selectStatus, trListComment,".classRate", bodyTable);

    </script>

@endsection
