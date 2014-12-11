@extends('layout')

@section('content')
	<div class="container">
		<h1><i class="fa fa-user"></i> {{ Auth::user()->username }}</h1>
		<h1><i class="fa fa-at"></i> {{ Auth::user()->email }}</h1>
	</div>
@stop 