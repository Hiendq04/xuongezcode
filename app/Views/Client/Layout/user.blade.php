<?php
// if (isset($_POST['btnlogout'])) {
//     unset($_SESSION['user']);
//     route('/');
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> {{ $title }} </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href=" {{ route('/Public/Styles/Client.css') }} " />
</head>

<body>
    <header style="opacity: 1;" class="header-web">
        <div class="container">
            <nav>
                <a href=" {{route('/')}} ">
                    <div class="logo">
                        <svg aria-hidden="true" class="pre-logo-svg" focusable="false" viewBox="0 0 24 24" role="img"
                            width="60px" height="60px" fill="none">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M21 8.719L7.836 14.303C6.74 14.768 5.818 15 5.075 15c-.836 0-1.445-.295-1.819-.884-.485-.76-.273-1.982.559-3.272.494-.754 1.122-1.446 1.734-2.108-.144.234-1.415 2.349-.025 3.345.275.2.666.298 1.147.298.386 0 .829-.063 1.316-.19L21 8.719z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </a>
                <form action="<?=$clientUrl . " group"?>" class="search" method="post">
                    <input type="text" placeholder="Tìm kiếm chủ để theo ID" name="id" />
                    <button type="submit" name="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <div class="menu">
                    <ul>
                        <li><a href="<?= route('/') ?>">Trang chủ</a></li>
                        <li><a href="#">Hỗ trợ</a></li>
                    </ul>
                    <div>
                        <div class=" dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?=(!isset($_SESSION['user']['avatar'])) ? pathUpload('user.jpg') : pathUpload($_SESSION['user']['avatar'])?>"
                                    class="avatar-user" alt="" />
                            </button>

                            <ul class="dropdown-menu gap-2">
                                <?php
if (isset($_SESSION['user'])) {
    ?>
                                <li><a class="dropdown-item" href="{{route('/infoAccount')}}">Thông tin cá
                                        nhân</a></li>
                                <?php
if ($_SESSION['user']['role'] == 'admin') {
        ?>
                                <li><a class="dropdown-item" href="{{route('/admin')}}">Trang quản trị</a></li>
                                <?php
}
    ?>
                                <!-- <li><a class="dropdown-item" href="<?=$clientUrl . "cart"?>">Giỏ hàng</a></li> -->
                    <li><a class="dropdown-item" href="{{route('myCourse')}}">Khóa học của tôi</a></li>
                                <li>
                                    <form action="{{route('/logOut')}}" method="post">
                                        <button type="submit" name="btnlogout" class="btn btn-danger"
                                            style="width:100%;">Đăng xuất</button>
                                    </form>
                                </li>
                                <?php
} else {
    ?>
                                <li><a class="dropdown-item" href="{{route('/signup')}}">Đăng kí</a></li>
                                <li><a class="dropdown-item" href="{{route('/login')}}">Đăng nhập</a></li>
                                <?php
}
?>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    @yield('content')



<footer>
    <p>@hiendqph37334</p>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
    integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.filtering').slick({
        slidesToShow: 4,
        slidesToScroll: 4
    });

    $('.hotProductHome').slick({
        slidesToShow: 5,
        slidesToScroll: 5
    });

    var filtered = false;

    $('.js-filter').on('click', function () {
        if (filtered === false) {
            $('.filtering').slick('slickFilter', ':even');
            $(this).text('Unfilter Slides');
            filtered = true;
        } else {
            $('.filtering').slick('slickUnfilter');
            $(this).text('Filter Slides');
            filtered = false;
        }
    });

    function chooseFile(fileInput, idImg) {
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById(idImg).setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);

        }
    }
    // Lưu vị trí cuộn khi trang bị đóng
    window.addEventListener('beforeunload', function () {
        localStorage.setItem('scrollPosition', window.scrollY);
    });

    // Kiểm tra xem có vị trí cuộn đã lưu trữ hay không
    document.addEventListener('DOMContentLoaded', function () {
        var savedScrollPosition = localStorage.getItem('scrollPosition');

        // Nếu có vị trí cuộn được lưu trữ, thì đặt lại vị trí cuộn
        if (savedScrollPosition !== null) {
            window.scrollTo(0, savedScrollPosition);
        }
    });

    // closs mesage
    let closeMessage = document.querySelector(".message-close");
    if (closeMessage) {
        closeMessage.onclick = function () {
            closeMessage.parentNode.remove()
        }
    }

    function formatNumber(input) {
        let value = input.value.replace(/\D/g, '');
        value = new Intl.NumberFormat().format(value);
        input.value = value;
    }



    //   api tinh

    $(document).ready(function () {
        $.ajax({
            url: "https://provinces.open-api.vn/api/",
            type: "GET",
            success: function (reponse) {
                var tinh = '';
                for (i = 0; i < reponse.length; i++) {
                    tinh += '<option value="' + reponse[i].code + '">' + reponse[i].name + '</option>';
                }
                $("#tinh").html(tinh);
            }
        });
        $('#tinh').change(function () {
            var idTinh = $('#tinh').val();
            $.ajax({
                url: "https://provinces.open-api.vn/api/p/" + idTinh + "?depth=2",
                type: "GET",
                success: function (data) {
                    var huyen = '';
                    var listHuyen = data.districts;
                    for (var i = 0; i < listHuyen.length; i++) {
                        huyen += '<option value="' + listHuyen[i].code + '">' + listHuyen[i].name + '</option>';
                    }
                    $("#huyen").html(huyen);
                }
            });
        });
        $('#huyen').change(function () {
            var idHuyen = $('#huyen').val();
            $.ajax({
                url: "https://provinces.open-api.vn/api/d/" + idHuyen + "?depth=2",
                type: "GET",
                success: function (data) {
                    var xa = '';
                    var listXa = data.wards;
                    for (var i = 0; i < listXa.length; i++) {
                        xa += '<option value="' + listXa[i].code + '">' + listXa[i].name + '</option>';
                    }
                    $("#xa").html(xa);
                }
            });
        });
    });
</script>
</body>

</html>