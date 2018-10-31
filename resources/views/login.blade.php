@extends('includes.login')
@section('pageTitle','Login')
    @section('loginContent')

            <h3>Welcome to</h3>
            <h2>The F Factor</h2>
            <form method="POST" class="loginform" action="{{ route('login') }}">
                @csrf
            {{--<form class="loginform">--}}
                <input type="text" placeholder="Email" name="email" value="{!! old('email') !!}">
                <input id="email" type="password" placeholder="Password" name="password" value="{{ old('password') }}" required autofocus>
                <div class="createaccount"><a href="#" title="Create a new account">Create a new account</a><br>
                    <a href="#" title="Reset your password">Reset your password</a></div>
                {{--<a class="submitbtn" href="milestone.php" title="LOGIN">LOGIN</a>--}}
                <button class="submitbtn">LOGIN</button>
            </form>
        @stop
