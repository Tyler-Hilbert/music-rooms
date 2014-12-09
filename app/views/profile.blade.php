@extends('layout')

@section('content')
	<div class="container">
		Name:
		{{ Auth::user()->username }}
		<br>
		Email:
		{{ Auth::user()->email }}
	</div>
@stop 