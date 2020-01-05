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
                            <h2><span><a href="{{route('home')}}">Trang chủ</a> | Thông tin</span></h2>
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
                @include('web/templates.success')
                @include('web/templates.alert')
                <h2>Thông tin tài khoản</h2>
                {!! Form::open([
                    'url' => route("auth/postPass"),
                    'method' => 'POST',
                    'accept-charset' => 'UTF-8',
                    'enctype' => 'multipart/form-data',
                    // 'class' => 'form-horizontal form-label-left',
                    // 'id' => 'main-form'
                ]) !!}
                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::password('password_current', ['class' => 'form-control', 'placeholder' => 'Nhập tên mât khẩu hiện tại', 'required' => 'required', 'style' => 'height:50px']) !!}
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::password('password_new', ['class' => 'form-control', 'placeholder' => 'Nhập mật khẩu mới', 'required' => 'required', 'style' => 'height:50px']) !!}
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::password('password_new_confirm', ['class' => 'form-control', 'placeholder' => 'Nhập lại mật khẩu mới', 'required' => 'required', 'style' => 'height:50px']) !!}
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