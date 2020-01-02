<div class="overlay"></div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
            <h2>Đăng ký</h2>
            <p>Đăng ký để nhận thông tin mới nhất về các bài học</p>
        </div>
    </div>
    <div class="row animate-box">
        <div class="col-md-6 col-md-offset-3">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open([
                        'method' =>  'POST',
                        'url' => route("subscribe"),
                        'class' => 'form-inline qbstp-header-subscribe'
                    ]) !!}
                        <div class="col-three-forth">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email của bạn" required>
                            </div>
                        </div>
                        <div class="col-one-third">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Đăng ký ngay</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
