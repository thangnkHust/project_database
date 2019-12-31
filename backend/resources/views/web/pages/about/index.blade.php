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
            <div class="video colorlib-video" style="background-image: url({{asset('front_page/images/img_bg_1.jpg')}});">
                    <a href="https://www.youtube.com/watch?v=VD3swXisXSM" class="popup-vimeo"><i class="icon-play3"></i></a>
                    <div class="overlay"></div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1 text-center animate-box">
                <div class="about-wrap">
                    <div class="heading-2">
                        <h2>Cảm ơn đã vào trang web của chúng tôi</h2>
                    </div>
                    <p>Chúng tôi là sinh viên HEDSPI K62 - Đại học Bách Khoa Hà Nội.</p>
                    <p>Đây là trang web về bài học và đề thi của các môn học lớp 12.</p>
                    <p>Trang web này là bài tập của chúng tôi cho môn thực hành cơ sở dữ liệu</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 animate-box">
                <p>Địa chỉ: Số 1 Đại Cồ Việt,
                    Quận Hai Bà Trưng, Hà Nội </p>
            </div>
            <div class="col-md-4 animate-box column">
                <p>Email: info@gmail.com
                </p>
                <p><a href="https://www.facebook.com/thuc.manhmai" target="_blank">Facebook</a> </p>
                <p><a href="https://www.instagram.com/khacthang150799/" target="_blank">Instagram</a> </p>
            </div>
            <div class="col-md-3 animate-box">
                <p>SĐT liên hệ: 0982.999.999</p>
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