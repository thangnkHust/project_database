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
                    'url' => route("auth/postProfile"),
                    'method' => 'POST',
                    'accept-charset' => 'UTF-8',
                    'enctype' => 'multipart/form-data',
                    // 'class' => 'form-horizontal form-label-left',
                    // 'id' => 'main-form'
                ]) !!}
                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::text('name', $items['name'], ['class' => 'form-control', 'placeholder' => 'Nhập tên bạn', 'required' => 'required']) !!}
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::email('email', $items['email'], ['class' => 'form-control', 'placeholder' => 'Nhập Email', 'required' => 'required', 'style' => 'height:50px']) !!}
                            {{-- <input type="email" id="email" class="form-control" placeholder="Nhập Email" required> --}}
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::file('avatar', ['class' => 'form-control', 'style' => 'height:50px']) !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <p style="margin-top: 0px;"><img src= "{{asset('images/user/' . $items['avatar'])}}" alt= "{{$items['avatar']}}" style = "width: 100%"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Gửi', ['class' => 'btn btn-primary']) !!}
                        {!! Form::hidden('avatar_current', $items['avatar']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection