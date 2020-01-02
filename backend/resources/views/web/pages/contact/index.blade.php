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
                            <h2><span><a href="{{route('home')}}">Trang chủ</a> | Liên Hệ</span></h2>
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
<div id="colorlib-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 animate-box">
                <h2>Thông tin liên lạc</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-info-wrap-flex">
                            <div class="con-info">
                                <p><span><i class="icon-location-2"></i></span> Số 1 Đại Cồ Việt, <br> Quận Hai Bà Trưng, Hà Nội</p>
                            </div>
                            <div class="con-info">
                                <p><span><i class="icon-phone3"></i></span> <a href="tel://0982999999">0982.999.999</a></p>
                            </div>
                            <div class="con-info">
                                <p><span><i class="icon-paperplane"></i></span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                            </div>
                            <div class="con-info">
                                <p><span><i class="icon-globe"></i></span> <a href="#">study.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1 animate-box">
                <h2>Phản hồi cho chúng tôi</h2>
                {!! Form::open([
                    'url' => route("$controllerName/feadback"),
                    'method' => 'POST',
                    'accept-charset' => 'UTF-8',
                    'enctype' => 'multipart/form-data',
                    // 'class' => 'form-horizontal form-label-left',
                    // 'id' => 'main-form'
                ]) !!}
                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::text('fullname', '', ['class' => 'form-control', 'placeholder' => 'Nhập họ và tên bạn', 'required' => 'required']) !!}
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Nhập Email', 'required' => 'required', 'style' => 'height:50px']) !!}
                            {{-- <input type="email" id="email" class="form-control" placeholder="Nhập Email" required> --}}
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::text('subject', '', ['class' => 'form-control', 'placeholder' => 'Nhập chủ đề', 'required' => 'required']) !!}
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('content', '', ['class' => 'form-control', 'placeholder' => 'Hãy viết những ý kiến của bạn về chất lượng của trang web', 'cols' => 30, 'rows' => 10, 'required' => 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Gửi', ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection