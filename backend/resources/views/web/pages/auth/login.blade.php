@extends('web/login')

@section('content')

<h4 class="card-title">Login</h4>

@include('web/templates.error')
@include('web/templates.alert')
@include('web/templates.success')

{!! Form::open([
    'method' =>  'POST',
    'url' => route("$controllerName/postlogin"),
    'id' => 'auth-form'
]) !!}

<div class="form-group">
    <label for="email">E-Mail Address</label>

    <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
</div>

<div class="form-group">
    <label for="password">Password
        <a href="forgot.html" class="float-right">
            Forgot Password?
        </a>
    </label>
    <input id="password" type="password" class="form-control" name="password" required data-eye>
</div>

<div class="form-group">
    <label>
        <input type="checkbox" name="remember"> Remember Me
    </label>
</div>

<div class="form-group no-margin">
    <button type="submit" class="btn btn-primary btn-block">
        Login
    </button>
</div>
<div class="margin-top20 text-center">
    Don't have an account? <a href="{{route('auth/register')}}">Create One</a>
</div>

{!! Form::close() !!}
@endsection