@extends('layout.main')

@section('content')
    <h2><a href="{{ URL::route('home') }}">Home</a></h2>

	<form action="{{ URL::route('account-create-post') }}" method="post">

		<div class="field">
			User Login: <input type="text" name="login" value="{{ Input::old('login') }}"> 
			@if($errors->has('login'))
				{{ $errors->first('login')}}
			@endif
		</div>

		<div class="field">
			Password: <input type="password" name="password"> 
			@if($errors->has('password'))
				{{ $errors->first('password')}}
			@endif
		</div>

		<div class="field">
			Password again: <input type="password" name="password_again"> 
			@if($errors->has('password_again'))
				{{ $errors->first('password_again')}}
			@endif
		</div>

		<input type="submit" value="Create account">
			{{ Form::token() }}
	</form>



@stop