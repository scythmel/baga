@extends('layouts.blank')

@section('content')
<div class="section1 tacenter">
    <form method="post" class="login" id="login" action="/login">
        {!! csrf_field() !!}
        <div class="entry">
            <input type="text" id="username" name="username" class="textbox" placeholder="Username" maxlength="100"
                value="{{ Input::old('username') }}">
            @if ($errors->has('username'))<label for="username" class="error">{{ $errors->get('username') }}</label>@endif
        </div>
        <div class="entry">
            <input type="password" id="password" name="password" class="textbox" placeholder="Password" maxlength="50"
                value="">
            @if ($errors->has('password'))<label for="pwd" class="error">{{ $errors->get('password') }}</label>@endif
            @if (Session::has('login_error'))
                <label for="pwd" class="error">{{ Session::get('login_error') }}</label>
                @if (Session::has('login_error'))
                        {{ Session::forget('login_error') }}
                @endif
            @endif
        </div>
        <div class="entry tacenter">
            <input type="submit" id="submitbtn" name="gosubmit" class="button1" value="Login">
        </div>
    </form>
</div>