@extends('Layout.admin')
@section('content')

<form action="" method="post">
    <div class="mb-3">
        <label for="formFile" class="form-label">Tên danh mục</label>
        <input name="name" class="form-control" type="text" id="formFile">
    </div>
    <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Mô tả</label>
        <textarea name="description" style="max-height: 200px;" class="form-control" id="formFileMultiple"></textarea>
    </div>
    <div class="mb-3">
        <label for="formFileThum" class="form-label">Ảnh</label><br>
        <label for="formFileThum" class="form-label"><img id="img-add-cat" alt="" style="height: 200px;" class=""
                src=""></label>
        <input name="thumbnail" class="form-control" onchange="chooseFile(this,'img-add-cat')" type="file"
            id="formFileThum">
    </div>
    <div>
        <input class="btn btn-success form-control" type="submit" value="Thêm">
    </div>
</form>
<?php 
    if(isset($_COOKIE['addCat'])){
        echo '<script>';
        echo 'Swal.fire({
            title: "Thành công!",
            text: "Thêm danh mục thành công!",
            icon: "success"
        });';
        echo '</script>';
    }
    if(isset($_COOKIE['errCat'])){
        echo '<script>';
        echo 'Swal.fire({
            title: "Lỗi!",
            text: "Vui lòng điền tên danh mục!",
            icon: "error"
        });';
        echo '</script>';
    }
?>

@endsection