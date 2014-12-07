@extends('layout');

@section('title', $room->name)

@section('content')
    <h1>{{ $room->name }}</h1>
@stop

@section('javascript')
    <script src="http://localhost:3000/socket.io/socket.io.js"></script>
    <script>
        var socket = io.connect('http://localhost:3000');

        socket.on('test', function(data) {
            alert(data);
            socket.emit('event', data);
        });
    </script>
@stop