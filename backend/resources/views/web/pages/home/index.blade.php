{{-- Phan cau truc chinh khi route goi view --}}
@extends('web.main')

{{-- Phan them le cua page home --}}
@section('slider')
<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides">
            <li style="background-image: url({{asset('front_page/images/img_bg_1.jpg')}});">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
                            <!-- <div class="slider-text-inner text-center">
                               <h1>Best Online Learning System</h1>
                               <p><a href="#" class="btn btn-primary btn-lg btn-learn">Register Now</a></p>
                           </div> -->
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url({{asset('front_page/images/img_bg_2.jpg')}});">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
                            <!-- <div class="slider-text-inner text-center">
                               <h1>Online Free Course</h1>
                               <p><a href="#" class="btn btn-primary btn-lg btn-learn">Free Trial</a></p>
                           </div> -->
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url({{asset('front_page/images/img_bg_3.jpg')}});">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
                            <!-- <div class="slider-text-inner text-center">
                               <h1>Education is a Key to Success</h1>
                               <p><a href="#" class="btn btn-primary btn-lg btn-learn">Register Now</a></p>
                           </div> -->
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url({{asset('front_page/images/img_bg_4.jpg')}});">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
                            <!-- <div class="slider-text-inner text-center">
                               <h1>Best Online Learning Center</h1>
                               <p><a href="#" class="btn btn-primary btn-lg btn-learn">Register Now</a></p>
                           </div> -->
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 intro-wrap">
            <div class="intro-flex">
                <div class="one-third color-2 animate-box">
                    <span class="icon">
                        <i class="flaticon-open-book"></i>
                    </span>
                    <div class="desc">
                        <h3>
                            <p>Học Tập</p>
                        </h3>
                    </div>
                </div>
                <div class="one-third color-1 animate-box">
                    <span class="icon">
                        <i class="flaticon-market"></i>
                    </span>
                    <div class="desc">
                        <h3>
                            <p>Thi Thử</p>
                        </h3>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="about-desc animate-box">
                <h2>Website dành cho học sinh lớp 12</h2>
                <div class="fancy-collapse-panel">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">Tại sao nên chọn
                                        chúng tôi?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>Chúng tôi cung cấp các bài học mới nhất, sát nhất với chương
                                                trình lớp 12. Những đề thi thử chất lượng, được chọn lọc bởi
                                                nhiều giáo viên nổi tiếng </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">Chúng tôi có những gì?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <p>Chúng tôi cung cấp các
                                        <strong>bài học, thi thử</strong> các môn học trong chương trình lớp
                                        12 </p>
                                    <ul>
                                        <li>Toán học</li>
                                        <li>Vật Lý</li>
                                        <li>Hoá Học</li>
                                        <li>Sinh học</li>
                                        <li>Anh văn</li>
                                        <li>Giáo dục công dân</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">Nhóm chúng tôi
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <li>Nguyễn Khắc Thắng - student at HUST</li>
                                    <li>Mai Mạnh Thục - student at HUST</li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="colorlib-services">
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="flaticon-books"></i>
                    </span>
                    <div class="desc">
                        <h3>Professional Courses</h3>
                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="flaticon-professor"></i>
                    </span>
                    <div class="desc">
                        <h3>Experienced Instructor</h3>
                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="flaticon-book"></i>
                    </span>
                    <div class="desc">
                        <h3>Practical Training</h3>
                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="flaticon-diploma"></i>
                    </span>
                    <div class="desc">
                        <h3>Validated Certificate</h3>
                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="colorlib-counter" class="colorlib-counters" style="background-image: url({{asset('front_page/images/img_bg_2.jpg')}});"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-3 col-sm-6 animate-box">
                    <div class="counter-entry">
                        <span class="icon">
                            <i class="flaticon-book"></i>
                        </span>
                        <div class="desc">
                            <span class="colorlib-counter js-counter" data-from="0" data-to="10"
                                data-speed="1800" data-refresh-interval="50"></span>
                            <span class="colorlib-counter-label">Courses</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 animate-box">
                    <div class="counter-entry">
                        <span class="icon">
                            <i class="flaticon-student"></i>
                        </span>
                        <div class="desc">
                            <span class="colorlib-counter js-counter" data-from="0" data-to="3653"
                                data-speed="5000" data-refresh-interval="50"></span>
                            <span class="colorlib-counter-label">Students</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 animate-box">
                    <div class="counter-entry">
                        <span class="icon">
                            <i class="flaticon-professor"></i>
                        </span>
                        <div class="desc">
                            <span class="colorlib-counter js-counter" data-from="0" data-to="2300"
                                data-speed="5000" data-refresh-interval="50"></span>
                            <span class="colorlib-counter-label">Teachers</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 animate-box">
                    <div class="counter-entry">
                        <span class="icon">
                            <i class="flaticon-earth-globe"></i>
                        </span>
                        <div class="desc">
                            <span class="colorlib-counter js-counter" data-from="0" data-to="200"
                                data-speed="5000" data-refresh-interval="50"></span>
                            <span class="colorlib-counter-label">Countries</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="colorlib-classes colorlib-light-grey"></div> --}}

{{-- What are the students says --}}

<div class="colorlib-trainers">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
                <h2>Thành viên admin</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            {{-- <div class="col-md-6 col-sm-6 animate-box">
                <div class="trainers-entry">
                    <div class="trainer-img" style="background-image: url({{asset('front_page/images/私.jpg')}})"></div>
                    <div class="desc">
                        <h3>Nguyễn Khắc Thắng</h3>
                        <span>Student</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 animate-box">
                <div class="trainers-entry">
                    <div class="trainer-img" style="background-image: url({{asset('front_page/images/person2.jpg')}})"></div>
                    <div class="desc">
                        <h3>Mai Mạnh Thục</h3>
                        <span>Student</span>
                    </div>
                </div>
            </div> --}}
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
