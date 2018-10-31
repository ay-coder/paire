@extends('includes.login')
@section('pageTitle','Signup')
@section('loginClass','signup')
@section('loginContent')
    <h3>Create your account</h3>
    <h2>The F Factor</h2>
    <form method="POST" action="{{ route('register') }}" class="loginform">
        @csrf
        <div class="row">
            <div class="col-md-6 col-sm-12"><input class="{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{!! old('firstName') !!}" id="firstName" type="text" placeholder="First Name"></div>
            <div class="col-md-6 col-sm-12"><input class="{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{!! old('lastName') !!}" id="firstName" type="text" placeholder="Last Name"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12"><input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" type="text" placeholder="Email" required></div>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
            <div class="col-md-6 col-sm-12"><input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required></div>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="applypolicy"><input type="checkbox">I have read and accepted the Terms and Conditions and Privacy
            Policy
        </div>
        <div class="applypolicy">Are you already a member? <a href="login" title="Login">Login</a></div>
        <button class="submitbtn">SIGN UP</button>
    </form>
@stop
{{--{!! dd($errors) !!}--}}