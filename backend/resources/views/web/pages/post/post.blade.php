@extends('web.main')

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
                                <h1>{{$item['name']}}</h1>
                                <h2><span><a href="{{route('home')}}">TRANG CHỦ</a> | <a href="{{route('post/subject', ['subject_name' => $params['subject_name'], 'subject_id' => $params['subject_id']])}}"> {{$item->subject->name}}</a> | {{$item['name']}}</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            </ul>
        </div>
    </aside>
@endsection
        
@section('content')
<div class="colorlib-classes">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="row row-pb-lg">
                    <div class="col-md-10 animate-box">
                        <div class="classes class-single">
                            <div class="classes-img" style="background-image: url({{asset('images/post/' . $item['thumb'])}});">
                                <span class="price text-center"><small>Free</small></span>
                            </div>
                            <div class="desc desc2">
                                <h3><a>{{$item['name']}}</a></h3>
                                {{-- <p><span class="math display"> {!!$item['content']!!}</span></p> --}}
                                {!!$item['content']!!}
                                {{-- <p><a href="#" class="btn btn-primary btn-outline btn-lg">Live Preview</a> or <a href="#" class="btn btn-primary btn-lg">Download File</a></p> --}}
                            </div>
                        </div>
                    </div>
                </div>


                {{-- comment --}}
                <div class="row row-pb-lg animate-box">
                    <div class="col-md-10">
                        <div class="review">
                            <div class="fb-comments" data-href="{{route('post/post',[
                                'subject_id' => $params['subject_id'],
                                'subject_name' => $params['subject_name'],
                                'post_id' => $params['post_id'],
                                'post_name' => $params['post_name']
                            ])}}" data-width="100%" data-numposts="5"></div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>	
</div>
@endsection
