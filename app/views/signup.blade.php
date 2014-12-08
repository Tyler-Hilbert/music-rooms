@extends('layout')

@section('content')
	<h1>Sign up</h1>
	{{ Form::open(array('route' => 'SignUp.store')) }}

		<ul>
			<li>
				{{ Form::label('username', 'Username:') }}
				{{ Form::text('username') }}
			</li>
			<li>
				{{ Form::label('email', 'Email:') }}
				{{ Form::text('email') }}
			</li>
			<li>
				{{ Form::label('password', 'Password:') }}
				{{ Form::password('password') }}
			</li>
			<li>
				{{ Form::submit() }}
			</li>
		</ul>
	{{ Form::close() }}
@stop 