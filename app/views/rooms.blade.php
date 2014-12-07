@extends('layout')

@section('title', 'Rooms')

@section('content')
    <div class="container">
        @foreach ($rooms as $room) 
            <div class="well">
                <a href="{{ URL::route('rooms.show', $room->id) }}">{{ $room->name }}</a>
            </div>
        @endforeach
    </div>
@stop