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
                                <h2><span><a href="{{route('home')}}">TRANG CHỦ</a> | <a href="{{route('exam/subject', ['subject_name' => $params['subject_name'], 'subject_id' => $params['subject_id']])}}"> {{$item->subject->name}}</a> | {{$item['name']}}</span></h2>
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
    <h2 class="col-md-offset-2">Bắt đầu làm bài thi</h2>
    <div class="container">
        <div class="row">
            <div class="col-10 col-md-offset-1">
                <div class="row row-pb-lg">
                    <div class="col-md-9 animate-box">
                        <div class="classes class-single" style="border: 1px solid black">
                            <div class="desc desc2">
                                <form action="test.php" method="post">
                                    <!-- Cau 1 -->
                                    <input type="hidden" value="exam1">
                                    <label for="ques1">Câu hỏi 1: </label><br>
                                    <span>Tìm giá trị lớn nhất M và giá trị nhỏ nhất m của y = x
                                        <sup>4</sup> - 2x
                                        <sup>2</sup> + 3 tr&ecirc;n [0; 2] Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis odio quis eaque deleniti nam ipsam culpa. Illo atque aliquam, quibusdam, voluptatem ex sint maiores tempore nisi ipsa minus repellendus et!:
                                    </span><br>
                                    &nbsp;&nbsp;<input name="ques1" type="radio" value="1" />&nbsp;&nbsp;A.
                                    <span>M= 5, m = 2</span><br>
                                    &nbsp;&nbsp;<input name="ques1" type="radio" value="2" />&nbsp;&nbsp;B.
                                    <span>M= 5, m = 2</span><br>
                                    &nbsp;&nbsp;<input name="ques1" type="radio" value="3" />&nbsp;&nbsp;C.
                                    <span>M= 5, m = 2</span><br>
                                    &nbsp;&nbsp;<input name="ques1" type="radio" value="4" />&nbsp;&nbsp;D.
                                    <span>M= 5, m = 2</span><br><br>
                                    <!-- Cau 2 -->
                                    <label for="ques2">Câu hỏi 2: </label><br>
                                    <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae minus numquam ea libero, aperiam similique fuga natus dignissimos rerum quisquam doloribus id in minima, sequi magnam vero consequatur earum asperiores?
                                    </span><br>
                                    &nbsp;&nbsp;<input name="ques2" type="radio" value="1" />&nbsp;&nbsp;A.
                                    <span>M= 5, m = 2</span><br>
                                    &nbsp;&nbsp;<input name="ques2" type="radio" value="2" />&nbsp;&nbsp;B.
                                    <span>M= 5, m = 2</span><br>
                                    &nbsp;&nbsp;<input name="ques2" type="radio" value="3" />&nbsp;&nbsp;C.
                                    <span>M= 5, m = 2</span><br>
                                    &nbsp;&nbsp;<input name="ques2" type="radio" value="4" />&nbsp;&nbsp;D.
                                    <span>M= 5, m = 2</span><br><br>
                                    <!-- Cau 3 -->
                                    <label for="ques1">Câu hỏi 3: </label><br>
                                    <span>Tìm giá trị lớn nhất M và giá trị nhỏ nhất m của y = x
                                        <sup>4</sup> - 2x
                                        <sup>2</sup> + 3 tr&ecirc;n [0; 2]:
                                    </span><br>
                                    &nbsp;&nbsp;<input name="ques3" type="radio" value="1" />&nbsp;&nbsp;A.
                                    <span>M= 5, m = 2</span><br>
                                    &nbsp;&nbsp;<input name="ques3" type="radio" value="2" />&nbsp;&nbsp;B.
                                    <span>M= 5, m = 2</span><br>
                                    &nbsp;&nbsp;<input name="ques3" type="radio" value="3" />&nbsp;&nbsp;C.
                                    <span>M= 5, m = 2</span><br>
                                    &nbsp;&nbsp;<input name="ques3" type="radio" value="4" />&nbsp;&nbsp;D.
                                    <span>M= 5, m = 2</span><br><br>
                                    <!-- Cau 4 -->
                                    <label for="ques1">Câu hỏi 4: </label><br>
                                    <span>Tìm giá trị lớn nhất M và giá trị nhỏ nhất m của y = x
                                        <sup>4</sup> - 2x
                                        <sup>2</sup> + 3 tr&ecirc;n [0; 2]:
                                    </span><br>
                                    &nbsp;&nbsp;<input name="ques4" type="radio" value="1" />&nbsp;&nbsp;A.
                                    <span>M= 5, m = 2</span><br>
                                    &nbsp;&nbsp;<input name="ques4" type="radio" value="2" />&nbsp;&nbsp;B.
                                    <span>M= 5, m = 2</span><br>
                                    &nbsp;&nbsp;<input name="ques4" type="radio" value="3" />&nbsp;&nbsp;C.
                                    <span>M= 5, m = 2</span><br>
                                    &nbsp;&nbsp;<input name="ques4" type="radio" value="4" />&nbsp;&nbsp;D.
                                    <span>M= 5, m = 2</span><br><br>
                                    <!-- Cau 5 -->
                                    <label for="ques1">Câu hỏi 5: </label><br>
                                    <span>Tìm giá trị lớn nhất M và giá trị nhỏ nhất m của y = x
                                        <sup>4</sup> - 2x
                                        <sup>2</sup> + 3 tr&ecirc;n [0; 2]:
                                    </span><br>
                                    &nbsp;&nbsp;<input name="ques5" type="radio" value="1" />&nbsp;&nbsp;A.
                                    <span>M= 5, m = 2</span><br>
                                    &nbsp;&nbsp;<input name="ques5" type="radio" value="2" />&nbsp;&nbsp;B.
                                    <span>M= 5, m = 2</span><br>
                                    &nbsp;&nbsp;<input name="ques5" type="radio" value="3" />&nbsp;&nbsp;C.
                                    <span>M= 5, m = 2</span><br>
                                    &nbsp;&nbsp;<input name="ques5" type="radio" value="4" />&nbsp;&nbsp;D.
                                    <span>M= 5, m = 2</span><br><br>
                                    <input type="submit" value="submit" class="btn btn-primary" onclick="myFunction()">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="background-color: red;">ABC</div>
                </div>
            </div>

            {{-- Comment extends facebook --}}
            <div class="row row-pb-lg animate-box">
                <div class="col-md-9 col-md-offset-1">
                    <div class="review">
                        <div class="fb-comments" data-href="{{route('exam/exam',[
                            'subject_id' => $params['subject_id'],
                            'subject_name' => $params['subject_name'],
                            'exam_id' => $params['exam_id'],
                            'exam_name' => $params['exam_name']
                        ])}}" data-width="100%" data-numposts="5"></div>
                    </div> 
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
