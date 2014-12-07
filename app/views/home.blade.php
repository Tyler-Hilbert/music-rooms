@extends('layout')

@section('content')
  <div class="container">
    <h1>Home</h1>
    <h2>Create room</h2>
    {{ Form::open(['route' => 'rooms.store']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Room name']) }}
        {{ Form::submit('Create room', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
  </div>
@stop