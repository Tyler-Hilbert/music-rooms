@extends('layout')

@section('content')
	<div class="container">
		<h1>Sign up</h1>
		{{ Form::open(array('route' => 'SignUp.store')) }}
			{{ Form::label('username', 'Username:') }}
			{{ Form::text('username') }}
			<br>
			{{ Form::label('email', 'Email:') }}
			{{ Form::text('email') }}
			<br>
			{{ Form::label('password', 'Password:') }}
			{{ Form::password('password') }}
			<br>
			{{ Form::submit() }}
		{{ Form::close() }}
	</div>
@stop 