@extends('Layout.admin')
@section('content')

    @foreach($courses as $course)
    <div class="mt-5">
        <?php var_dump($course); ?>
    <?php $idCourse = $course['id'] ?>
    <div onclick="window.location='{{routeAdmin('/course/info/'.$idCourse)}}'" class="boxCourse">
        <div class="img"><img src="{{pathUpload('Acer_Wallpaper_01_5000x2814.jpg')}}" alt=""></div>
        <div class="right">
            <h4> {{$course['name']}} </h4>
            <div class="content"> 
                {{$course['description']}}
            </div>
    </div>
    </div>
    @endforeach

@endsection
