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
                            <h1>Về Chúng Tôi</h1>
                            <h2><span><a href="{{route('home')}}">Trang chủ</a> | Về Chúng Tôi</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        </ul>
    </div>
</aside>
@endsection

{{-- Phan noi dung le --}}
@section('content')
<div id="colorlib-about" class="colorlib-light-grey">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-8 col-md-offset-2 row-pb-md animate-box">
                <div class="video colorlib-video" style="background-image: url(images/img_bg_1.jpg);">
                    <a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-play3"></i></a>
                    <div class="overlay"></div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1 text-center animate-box">
                <div class="about-wrap">
                    <div class="heading-2">
                        <h2>Robust Gym the leading fitness site</h2>
                    </div>
                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                    <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 animate-box">
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
            </div>
            <div class="col-md-4 animate-box">
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
            </div>
            <div class="col-md-4 animate-box">
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
            </div>
        </div>
    </div>
</div>

<div class="colorlib-trainers">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
                <h2>Thành viên Admin</h2>
                <p></p>
            </div>
        </div>
        <div class="row">
            <aside id="colorlib-hero">
                <div class="flexslider">
                    <ul class="slides">
                        <li style="background-image: url({{asset('front_page/images/私.jpg')}})">
                            <div class="overlay"></div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
                                        <div class="slider-text-inner text-center">
                                            <h1>Nguyễn Khắc Thắng</h1>
                                            <h3 style="color:aliceblue">Student</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li style="background-image: url({{asset('front_page/images/person2.jpg')}})">
                            <div class="overlay"></div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
                                        <div class="slider-text-inner text-center">
                                            <h1>Mai Mạnh Thục</h1>
                                            <h3 style="color:aliceblue">Student</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection