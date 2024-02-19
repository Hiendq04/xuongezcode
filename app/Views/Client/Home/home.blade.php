@extends('Layout.user')
@section('content')
<div class="container-xxl">
    <div class="banner">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://tse1.mm.bing.net/th?id=OIP.ugctw4soj6o8xOQ_Emlv8gHaDf&pid=Api&P=0&h=220" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="https://cdn-www.vinid.net/2020/08/789dc446-bannerweb_vsmart_1920x1080-1536x864.jpg" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="https://png.pngtree.com/png-clipart/20220823/original/pngtree-stereo-mobile-phone-camera-airplane-plant-summer-travel-planning-web-banners-png-image_8473386.png" class="d-block w-100" alt="..." />
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <div class="groupCourse">
        <div class="title">
            <p>Danh sách nhóm khóa học</p>


        </div>
        <div class="courses">
            @foreach($categories as $category)
            <?php if($category['status']=='active'){ ?>
            <a href="{{ route('/category/'.$category['id'].'') }}">
                <div class="img"><img src="https://media.quizizz.com/_mdserver/main/media/resource/gs/quizizz-media/quizzes/a398beab-715a-4af4-9fbc-5b53caebea8b-v2?w=200&h=200" alt=""></div>
                <div class="courseInfo">
                    <span class="length"><??></span>
                    <span class="played"><??></span>
                </div>
                <p class="courseName">{{$category['name']}}</p>
            </a>
            <?php } ?>
            @endforeach
        </div>
    </div>


</div>
</div>
</div>

<?php
if(isset($_COOKIE['logout'])) {
    echo '<script>';
    echo 'Swal.fire({
            title: "Thành công!",
            text: "Đăng xuất thành công!",
            icon: "success",
            // showConfirmButton: false,
            timer: 1500
        });';
    echo '</script>';
}
if(isset($_COOKIE['login'])) {
    echo '<script>';
    echo 'Swal.fire({
            title: "Thành công!",
            text: "Đăng nhập thành công!",
            icon: "success",
            // showConfirmButton: false,
            timer: 1500
        });';
    echo '</script>';
}
?>


@endsection
