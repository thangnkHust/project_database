@extends('web/login')

@section('content')

<h4 class="card-title">Register</h4>

@include('web/templates.error')
@include('web/templates.alert')

{!! Form::open([
    'method' =>  'POST',
    'url' => route("$controllerName/postRegister"),
    'id' => 'auth-form'
]) !!}

<div class="form-group">
    <label for="name">Name</label>
    <input id="name" type="text" class="form-control" name="name" required autofocus>
</div>

<div class="form-group">
    <label for="email">E-Mail Address</label>
    <input id="email" type="email" class="form-control" name="email" required>
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input id="password" type="password" class="form-control" name="password" required data-eye>
</div>

{{-- <div class="form-group">
    <label>
        <input type="checkbox" name="agree" value="1"> I agree to the Terms and Conditions
    </label>
</div> --}}

<div class="form-group no-margin">
    <button type="submit" class="btn btn-primary btn-block">
        Register
    </button>
</div>
<div class="margin-top20 text-center">
    Already have an account? <a href="{{route('auth/login')}}">Login</a>
</div>

{!! Form::close() !!}
@endsection