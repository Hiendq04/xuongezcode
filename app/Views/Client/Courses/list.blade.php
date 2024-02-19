@extends('Layout.user')
@section('content')
    <div class="listCourse">
        @foreach($arrCourse as $course)
            <a href="">
                <?php if($course['status'] == 'active'): ?>
                <div class="boxCourse">
                    <div class="img">
                        <img src=" {{route('/Public/Uploads/Acer_Wallpaper_01_5000x2814.jpg')}} " alt="">
                    </div>
                    <div class="content">
                        <p> {{$course['name']}} </p>
                        <p> {{$course['description']}} </p>
                    </div>
                </div>
                <?php endif ?>
            </a>
        @endforeach
    </div>
@endsection
