@extends('web.main')

{{-- Nhung slider --}}
@section('slider')
<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides">
        <li style="background-image: url({{asset('front_page/images/img_bg_2.jpg')}});">
            <div class="overlay"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
                        <div class="slider-text-inner text-center">
                            <h1>HỌC TẬP</h1>
                            <h2><span><a href="{{route('home')}}">Trang chủ</a> | {{$items[0]->subject->name}}</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        </ul>
    </div>
</aside>
@endsection

@php
    use App\Helpers\URL as URL;
    $listPost = '';
    foreach ($items as $item) {
        $link = URL::linkExamDetail($item->subject->id, $item->subject->name, $item['id'], $item['name']);
        $listPost .= sprintf(
            '<div class="col-md-4 animate-box">
                <div class="classes">
                    <div class="classes-img" style="background-image: url(%s);">
                        <span class="price text-center"><small>Free</small></span>
                    </div>
                    <div class="desc">
                        <h3><a href="%s">%s</a></h3>
                        <p><i class="fa fa-eye"></i> %s</p>
                    </div>
                </div>
            </div>', asset('images/exam/' . $item['thumb']), $link, $item['name'], $item['viewed']);
    }
@endphp

{{-- Phan noi dung le --}}
@section('content')
<div class="colorlib-classes">
    <div class="container">
        <div class="row">
            {!!$listPost!!}
        </div>
    </div>	
</div>
@endsection

