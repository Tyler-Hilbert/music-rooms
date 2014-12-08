@extends('layout')

@section('content')
	<h1>Sign In</h1>
	{{ Form::open(array('route' => 'sessions.store')) }}
		{{ Form::label('email', 'Email:') }}
		{{ Form::text('email') }}
		<br>
		{{ Form::label('password', 'Password:') }}
		{{ Form::password('password') }}
		<br>
		{{ Form::submit() }}
	{{ Form::close() }}
@stop 