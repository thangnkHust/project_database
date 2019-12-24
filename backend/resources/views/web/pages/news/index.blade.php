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
                            <h1>Bài viết mới</h1>
                            <h2><span><a href="{{route('home')}}">Trang chủ</a> | Bài Viết Mới</span></h2>
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
    foreach ($itemsPost as $item) {
        $time = strtotime($item['updated_at']);
        $date = getdate($time);
        $linkPost = URL::linkPostDetail($item->subject->id, $item->subject->name, $item['id'], $item['name']);
        $month = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
        $listPost .= sprintf(
            '<div class="col-md-4 animate-box">
                <article class="article-entry">
                    <a href="%s" class="blog-img" style="background-image: url(%s);">
                        <p class="meta">
                            <span class="day">%s</span>
                            <span class="month">%s</span>
                        </p>
                    </a>
                    <div class="desc">
                        <h2><a href="%s">%s</a></h2>
                        <p class="admin"><span>Chủ đề:</span> <span>Học Tập | %s</span></p>
                    </div>
                </article>
            </div>', $linkPost, asset('images/post/' . $item['thumb']), $date['mday'], $month[$date['mon'] - 1], $linkPost, $item['name'], $item->subject->name
        );
    }

    $listExam = '';
    foreach ($itemsExam as $item) {
        $time = strtotime($item['updated_at']);
        $date = getdate($time);
        $linkExam = URL::linkExamDetail($item->subject->id, $item->subject->name, $item['id'], $item['name']);
        $listExam .= sprintf(
            '<div class="col-md-4 animate-box">
                <article class="article-entry">
                    <a href="%s" class="blog-img" style="background-image: url(%s);">
                        <p class="meta">
                            <span class="day">%s</span>
                            <span class="month">%s</span>
                        </p>
                    </a>
                    <div class="desc">
                        <h2><a href="%s">%s</a></h2>
                        <p class="admin"><span>Chủ đề:</span> <span>Thi Thử | %s</span></p>
                    </div>
                </article>
            </div>', $linkExam, asset('images/post/' . $item['thumb']), $date['mday'], $month[$date['mon'] - 1], $linkExam, $item['name'], $item->subject->name
        );
    }
@endphp

{{-- Phan noi dung le --}}
@section('content')
<div class="colorlib-blog colorlib-light-grey">
    <div class="container">
        <div class="row">
            {!!$listPost!!}
            {!!$listExam!!}
        </div>
    </div>	
</div>
@endsection
