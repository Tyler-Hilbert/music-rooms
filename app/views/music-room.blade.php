@extends('layout')

@section('content')
	<div class='container'>
		<h1>{{ $room->name }}</h1>
		<div class='col-md-6'>
			<div class='form-group'>
				<textarea id='input-text' class='form-control input-lg' placeholder="Say somthing..."></textarea>
			</div>
			<div class="form-group">
				<button class='btn btn-primary' id='btn-send'>Send</button>
			</div>
			<div id='message-container'></div>

			<div class='message' id='message-template' style='display: none'>
				<div class='username'></div>
				<div class='text'></div>
			</div>

			@foreach ($room->messages()->orderBy('id', 'desc')->get() as $message)
				<div class='message'>
					<div class='username'>{{ $message->user->username }}</div>
					<div class='text'>{{ $message->text }}</div>
				</div>
			@endforeach
		</div>
		<div class="col-md-6">
			<iframe src='https://w.soundcloud.com/player/?url={{ $room->current_song }}'	 frameborder="0" id="music-player" width="100%" height="166" scrolling="no"></iframe>
			<div class="form-group">
				<input type="text" class="form-control" id="input-track-url" placeholder="Paste a track URL here!" />
			</div>
			<button class="btn btn-primary btn-lg" id="btn-change-song">Change song</button>
		</div>
	</div>
@stop

@section('javascript')
	<script src='http://localhost:3000/socket.io/socket.io.js'></script>
	<script src="https://w.soundcloud.com/player/api.js"></script>
	<script>
		$(function() {
			var clientId = '26ad565050a53dabc194b9c3308e44f2';
			var socket = io.connect('http://localhost:3000');
			var username = '{{ Auth::user()->username }}';
			var roomId = {{ $room->id }};
			var userId = {{ Auth::id() }};
			var soundUrl = 'https://w.soundcloud.com/player/?url=http://api.soundcloud.com/tracks/176598088';
			var widget = SC.Widget(document.getElementById('music-player'));

			$('#btn-change-song').on('click', function() {
				var trackUrl = $('#input-track-url').val();
				var url = 'https://api.soundcloud.com/resolve.json?url=' + trackUrl + '&client_id=' + clientId;
				$.get(url, function(response) {
					socket.emit('song.changed', {
						uri: response.uri,
						perma: trackUrl
					});
					
					createMessage('Changed the song', username);
					$.post('/rooms/' + roomId + '/song', { song: response.uri });
				});
			});

			function createMessage(text, username) {
				$('#message-template').clone()
					.attr('id', 'new-message')
						.prependTo('#message-container');

				$('#new-message').find('.text').text(text);
				$('#new-message').find('.username').text(username);
				$('#new-message').removeAttr('id');
				$('#new-message').removeAttr('style');
			}

			$('#btn-send').on('click', function() {
				var inputText = $('#input-text');
				var data = {
					room_id: roomId,
					user_id: userId,
					username: username,
					text: inputText.val()
				};

				$.post('/messages', data).done(function() {
					socket.emit('message.create', data);
					inputText.val('');
				});
			});

			socket.on('connect', function() {
				socket.on('song.paused', function() {
					widget.pause();
				});

				socket.on('song.played', function() {
					widget.play();
				});

				socket.on('song.changed', function(data) {
					$('#input-track-url').val(data.perma);
					
					widget.load(data.uri, {
						callback: function() { 
							widget.play(); 
						}
					});
				});	

				socket.on('message.create', function(data) {
					if (data.room_id == roomId) {
						createMessage(data.text, data.username);
					}
				});
			});
		});
	</script>
@stop