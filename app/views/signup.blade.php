@extends('layout')

@section('content')
	<div class="container">

		<div class="col-md-6 col-md-offset-3 form-container">
			<h1>Register</h1>
			<div class="well well-lg">
				{{ Form::open(array('route' => 'sessions.store')) }}
					<div class="form-group">
						{{ Form::label('username', 'Username', ['class' => 'control-label']) }}
						{{ Form::text('username', null, ['class' => 'form-control input-lg']) }}
					</div>
					<div class="form-group">
						{{ Form::label('email', 'Email', ['class' => 'control-label']) }}
						{{ Form::text('Email', null, ['class' => 'form-control input-lg']) }}
					</div>
					<div class="form-group">
						{{ Form::label('password', 'Password', ['class' => 'control-label']) }}
						{{ Form::password('password', ['class' => 'form-control input-lg']) }}
					</div>
					<div class="form-group">
						{{ Form::submit('Register', ['class' => 'btn btn-primary btn-lg']) }}
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop 