@extends('Layout.admin')
@section('content')

<div class="boxCat">
    @foreach($categories as $cat)
        <a href="{{routeAdmin('/category/info/'.$cat['id'])}}">
        <div class="cate">
            <div class="img"><img src="{{pathUpload('Acer_Wallpaper_01_5000x2814.jpg')}}" alt=""></div>
            <span class="ms-1" style="display:block;width:100%;overflow:hidden;">{{$cat['name']}}</span>
            <!-- <span class="me-1" style="float:right">7777</span> -->
        </div>
        </a>

    @endforeach 
</div>

@endsection
