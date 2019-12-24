@php
    use App\Models\SubjectModel as SubjectModel;
    use App\Helpers\URL as URL;

    $subjectModel = new SubjectModel();
    $items = $subjectModel->listItems(null, ['task' => 'front-end-list-items']);

    // FIXME:menu class active
    $classPost = '';
    $classHome = '';
    $classExam = '';
    $classNews = '';
    $classAbout = '';
    $classContact = '';

    if(isset($activeHome)){
        $classHome = ($activeHome)?  'active':'';
    }

    if(isset($activePost)){
        $classPost = ($activePost)?  'active':'';
    }

    if(isset($activeExam)){
        $classExam = ($activeExam)?  'active':'';
    }

    if(isset($activeNews)){
        $classNews = ($activeNews)?  'active':'';
    }

    if(isset($activeAbout)){
        $classAbout = ($activeAbout)?  'active':'';
    }

    if(isset($activeContact)){
        $classContact = ($activeContact)?  'active':'';
    }

    $xhtmlMenuPost = '<li class="has-dropdown ' . $classPost . '">
                        <a style="cursor: default">Học tập</a>
                            <ul class="dropdown">';
    foreach ($items as $item) {
        
        $link = URL::linkPost($item['id'], $item['name']);
        $xhtmlMenuPost .= sprintf('<li><a href="%s">%s</a></li>', $link, $item['name']);
    }
    $xhtmlMenuPost .= '</ul></li>';
    
    $xhtmlMenuExam = '<li class="has-dropdown ' . $classExam . '">
                        <a style="cursor: default">Thi Thử</a>
                            <ul class="dropdown">';
    foreach ($items as $item) {
        
        $link = URL::linkExam($item['id'], $item['name']);
        $xhtmlMenuExam .= sprintf('<li><a href="%s">%s</a></li>', $link, $item['name']);
    }
    $xhtmlMenuExam .= '</ul></li>';

@endphp
<div class="upper-menu">
    <div class="container">
        <div class="row">
            <div class="col-xs-4">
                <p>Chào mừng đến với trang web của chúng tôi</p>
            </div>
            <div class="col-xs-6 col-md-push-2 text-right">
                <p>
                    <ul class="colorlib-social-icons">
                        <li>
                            <a href="#">
                                <i class="icon-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-dribbble"></i>
                            </a>
                        </li>
                    </ul>
                </p>
                <!-- <p class="btn-apply">
                    <a href="#">Apply Now</a>
                </p> -->
            </div>
        </div>
    </div>
</div>
<div class="top-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div id="colorlib-logo">
                    <a href="index.html">e-learning</a>
                </div>
            </div>
            <div class="col-md-10 text-right menu-1">
                <ul>
                    <li class="{{$classHome}}">
                        <a href="{{route('home')}}">Trang chủ</a>
                    </li>

                    {!!$xhtmlMenuPost!!}

                    {!!$xhtmlMenuExam!!}

                    <li class="{{$classNews}}">
                        <a href="{{route('news')}}">Bài viết mới</a>
                    </li>
                    <li class="{{$classAbout}}">
                        <a href="{{route('about')}}">Về chúng tôi</a>
                    </li>
                    <li class="{{$classContact}}">
                        <a href="{{route('contact')}}">Liên hệ</a>
                    </li>
                    <li class="btn-cta">
                        <a href="auth/index.html">
                            <span>Đăng nhập</span>
                        </a>
                    </li>
                    {{-- <li class="has-dropdown">
                        <a style="cursor: default">
                            <i class="fas fa-bars" style="font-size: 30px;"></i>
                        </a>
                        <ul class="dropdown">
                            <li>
                                <a href="exam.html">Admin</a>
                            </li>
                            <li>
                                <a href="exam.html">Thông tin</a>
                            </li>
                            <li>
                                <a href="exam.html">Đăng xuất</a>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>