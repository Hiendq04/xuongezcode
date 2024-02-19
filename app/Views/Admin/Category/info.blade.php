@extends('Layout.admin')
@section('content')

    <form action="" method="post" enctype="multipart/form-data">
        <div class="addAcc row mt-5 px-5">
            <div class="col-5 addAcc-img">
                <div>
                    <label style="width: 400px;height: 300px;overflow: hidden;" for="img-cat"><img id="img-update-cat" src="{{pathUpload(($category['thumbnail']!='') ? $category['thumbnail'] : 'pro.jpg')}}" style="width: 100%;min-height:100%;" alt="" ></label>
                </div>
                <div class="my-3">
                    <input hidden class="form-control" type="file" name="thumbnail" onchange="chooseFile(this,'img-update-cat')" id="img-cat">
                </div>
            </div>
            <div class="col-7 addAcc-acc">
                <div class="addAcc-acc-show">
                    <div class="title mt-5">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Tên</span>
                            <input id="name-cat" readonly type="text" class="form-control" value="{{$category['name']}}" require name="name" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Mô tả</span>
                            <textarea id="des-cat" readonly style="min-height:200px;max-height: 300px;" type="text" class="form-control" require name="description" id="basic-url" aria-describedby="basic-addon3">{{$category['description']}}</textarea>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Trạng thái</span>
                            <select id="status-cat" name="status" class="disable_select form-control" id="basic-url" aria-describedby="basic-addon3">
                                <?php
                                    if($category['status']== 'active') {
                                        echo "
                                        <option value='active' selected>Hoạt động</option>
                                        <option value='inactive'>Khóa</option>";
                                    }else if($category['status']== 'inactive') {
                                        echo "
                                        <option value='active'>Mở khóa</option>
                                        <option value='inactive' selected >Đã khóa</option>";
                                    }else{
                                        echo "
                                        <option value='0' selected hidden>Chọn</option>
                                        <option value='active'>Hoạt động</option>
                                        <option value='inactive'>Khóa</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input id="edit" type="button" class="btn btn-primary" value="Sửa">
                            <input id="update" hidden type="submit" class="btn btn-success" name="btn_update-acc" value="Hoàn tất">
                            <input id="cancel" hidden type="button" class="btn btn-danger" value="Hủy">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </form>
    <?php 
        if(isset($_COOKIE['update'])){
            echo '<script>';
            echo 'Swal.fire({
                title: "Thành công!",
                text: "Cập nhật thành công!",
                icon: "success"
            });';
            echo '</script>';
        }
    ?>
    <script>
        let edit = document.querySelector('#edit');
        let update = document.querySelector('#update');
        let cancel = document.querySelector('#cancel');
        let statusCat = document.querySelector('#status-cat');
        let imgCat = document.querySelector('#img-cat');
        let nameCat = document.querySelector('#name-cat');
        let desCat = document.querySelector('#des-cat');
        
        edit.onclick = function() {
            update.removeAttribute('hidden');
            cancel.removeAttribute('hidden');
            edit.setAttribute('hidden', 'true');
            desCat.removeAttribute('readonly');
            nameCat.removeAttribute('readonly');
            imgCat.removeAttribute('hidden');
            statusCat.classList.remove('disable_select');
        };

        cancel.onclick = function() {
            if(confirm("Bạn có muốn hủy quá trình không?")){
                location.reload();
            }
        };

        
    </script>

@endsection
