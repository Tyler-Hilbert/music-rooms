@extends('layout')

@section('title', 'Rooms')

@section('content')
    <div class="container">
        @foreach ($rooms as $room) 
            <div class="well">
                <h1>
                	<a href="{{ URL::route('rooms.show', $room->id) }}">{{ $room->name }}</a>
                </h1>
            </div>
        @endforeach
    </div>
@stop