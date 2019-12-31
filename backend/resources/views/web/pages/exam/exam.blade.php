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
                    <div class="col-md-10 animate-box">
                        <div class="classes class-single" style="border: 1px solid black">
                            <div class="desc desc2">
                                {!! Form::open([
                                    'method' => 'get',
                                    'accept-charset' => 'UTF-8',
                                    'enctype' => 'multipart/form-data',
                                    // 'class' => 'form-horizontal form-label-left',
                                    'id' => 'main-form'
                                ]) !!}
                                    <?php $tmp = 1?>
                                    <input type="hidden" value="exam1">
                                    @foreach ($items as $i)
                                        {{-- question --}}
                                        {!! Form::label($tmp, 'Câu hỏi ' . $tmp .':') !!}<br>
                                        <span>{!!$i['question']!!}</span><br>
                                        {{-- Answer A --}}
                                        &nbsp;&nbsp;{!! Form::radio($tmp, 1) !!}&nbsp;&nbsp;A.
                                        <span>{!!$i['answer_a']!!}</span><br>
                                        {{-- Answer B --}}
                                        &nbsp;&nbsp;{!! Form::radio($tmp, 2) !!}&nbsp;&nbsp;B.
                                        <span>{!!$i['answer_b']!!}</span><br>
                                        {{-- Answer C --}}
                                        &nbsp;&nbsp;{!! Form::radio($tmp, 3) !!}&nbsp;&nbsp;C.
                                        <span>{!!$i['answer_c']!!}</span><br>
                                        {{-- Answer D --}}
                                        &nbsp;&nbsp;{!! Form::radio($tmp, 4) !!}&nbsp;&nbsp;D.
                                        <span>{!!$i['answer_d']!!}</span><br><br>

                                        <?php $tmp += 1?>
                                    @endforeach
                                    {{-- Submit Form --}}
                                    {!! Form::submit('Submit', ['class' => 'btn btn-primary', 'id' => 'btn-click']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" style="background-color: red; text-align: center">
                        <span id="time" style="font-size: 40px; color : black;">90:00</span>
                        <script>
                            function startTimer(duration, display) {
                                var timer = duration, minutes, seconds;
                                // Countdown clock: 
                                var timeInterval = setInterval( () => {
                                    minutes = parseInt(timer / 60, 10)
                                    seconds = parseInt(timer % 60, 10);
                                    minutes = minutes < 10 ? "0" + minutes : minutes;
                                    seconds = seconds < 10 ? "0" + seconds : seconds;
                                    $("#time").html(minutes + ":" + seconds);
                                    timer--;
                                }, 1000);

                                // Set timeout: 
                                var timeout = setTimeout(() => {
                                    alert('TIME OUT!!!');
                                    alert('Xem kết quả ở cuối trang!');
                                    clearInterval(timeInterval);
                                    var timeView = duration - timer - 1;
                                    minutes = parseInt(timeView / 60, 10);
                                    seconds = parseInt(timeView % 60, 10);
                                    minutes = minutes < 10 ? "0" + minutes : minutes;
                                    seconds = seconds < 10 ? "0" + seconds : seconds;
                                    var result = minutes + ":" + seconds
                                    var idExam = "{{$item->id}}";
                                    // Show result when timeout:
                                    $.ajax({
                                        url: "/ajax/exam/"+idExam,
                                        method: "get",
                                        data: {
                                            time: result,
                                        },
                                        success: function(result){
                                            // alert(result);
                                            $("#result").html(result);
                                        }
                                    });
                                }, duration * 1000 + 1000);

                                // Cach 1:
                                $("#btn-click").click(function(e){
                                    // if(!confirm('Bạn muốn nộp bài?')){
                                    //     return false;
                                    // }
                                    var timeView = duration - timer - 1;
                                    minutes = parseInt(timeView / 60, 10);
                                    seconds = parseInt(timeView % 60, 10);
                                    minutes = minutes < 10 ? "0" + minutes : minutes;
                                    seconds = seconds < 10 ? "0" + seconds : seconds;
                                    var result = minutes + ":" + seconds
                                    var idExam = "{{$item->id}}";

                                    swal({
                                        title: "Bạn muốn nộp bài?",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                        })
                                        .then((willSubmit) => {
                                        if (willSubmit) {
                                            $.ajax({
                                                url: "/ajax/exam/"+idExam,
                                                method: "get",
                                                data:{
                                                    time: result,
                                                    arr: $("#main-form").serializeArray(),
                                                },
                                                success: function(result){
                                                    // clearInterval(timeInterval);
                                                    // clearTimeout(timeout);
                                                    // $("#result").html(result);
                                                    if($.isEmptyObject(result.error)){
                                                        swal(result.success, "Xem kết quả ở cuối trang!", {
                                                            icon: "success",
                                                        });
                                                        clearInterval(timeInterval);
                                                        clearTimeout(timeout);
                                                        $("#result").html(result.result);
                                                        // $("#result").html(result.test);
                                                    }else{
                                                        // printErrorMsg(result.error);
                                                        // alert(result.error);
                                                        swal(result.error, {
                                                            icon: "warning",
                                                        });
                                                    }
                                                }
                                            });
                                        } else {
                                            // swal("Your imaginary file is safe!");
                                        }
                                    });
                                    // Block submit form:
                                    e.preventDefault();
                                    
                                    // return false;
                                });
                                function printErrorMsg (msg) {
                                    $(".print-error-msg").find("ul").html('');
                                    $(".print-error-msg").css('display','block');
                                    $.each( msg, function( key, value ) {
                                        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                                    });
                                }
                            };

                            window.onload = function () {
                                var timer = 60 * 90,
                                display = document.querySelector('#time');
                                startTimer(timer, display);
                            };
                            
                                // // Cach 2: 
                                // timeInterval.onclick("#btn-click", () => {
                                //     clearInterval(timeInterval);
                                //     timeView = duration - timer;
                                //     console.log(timeView);
                                // });
                                // }
                        </script>
                        
                    </div>
                </div>
                {{-- @include('admin/templates.error') --}}
                {{-- <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div> --}}
                <div class="row row-pb-lg" id="result">
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
