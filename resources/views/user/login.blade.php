@extends('index')
@section('title', 'Log In')

@section('content')
<h3>Login Form</h3>
@foreach ($errors->all() as $error)
    <p style="color: firebrick; font-size: 0.8em;">Warning: {{ $error }}</p>
@endforeach
<form class="form" action="" method="post">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <div class="">
        <label for="">Username :</label>
        <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Your username">
    </div>
    <br>
    <div class="">
        <label for="">Password :</label>
        <input type="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}">
    </div>
    <br>
    <div class="">
        <input type="submit" name="submit" value="Login" class="ui-button ui-widget ui-corner-all">        
    </div>
</form>
@endsection
