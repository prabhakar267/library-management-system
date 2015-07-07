@extends('layout.main')

@section('content')
    <h2><a href="{{ URL::route('home') }}">Home</a></h2>

	<form action="{{ URL::route('account-sign-in-post') }}" method="post">
 
		<div class="field">
			User Login: <input type="text" name="login" value="{{ Input::old('login') }}"> 
			@if($errors->has('user_login'))
				{{ $errors->first('login')}}
			@endif
		</div>

		<div class="field">
			Password: <input type="password" name="password" > 
			@if($errors->has('password'))
				{{ $errors->first('password')}}
			@endif
		</div>

		<div class="field">
			<input type="checkbox" name="remember"  id="remember"> 
			<label for="remember"> 
				Remember me
		</div>
 
		<input type="submit" value="Sign in">
			{{ Form::token() }}

	</form>



@stop