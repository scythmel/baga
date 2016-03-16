@extends('layouts.blank')

@section('content')
<div class="col-md-4 col-md-offset-4">
    <form method="post" id="login" action="/login">
        {!! csrf_field() !!}
        <div class="form-group @if($errors->has('username')) has-error @endif">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ Input::old('username') }}">
          @if ($errors->has('username'))<span id="helpBlock2" class="help-block">{{ $errors->get('username') }}</span>@endif
        </div>
        <div class="form-group @if($errors->has('password')) has-error @endif">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          @if ($errors->has('password'))<span id="helpBlock2" class="help-block">{{ $errors->get('password') }}</span>@endif
        </div>
        @if (Session::has('login_error'))
        <div class="form-group">
          <p class="help-block">{{ Session::forget('login_error') }}</p>
        </div>
        @endif
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>