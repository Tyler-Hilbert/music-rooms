var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);

server.listen(3000);

io.on('connection', function(socket) {
  socket.on('message.create', function(data) {
  	io.sockets.emit('message.create', data);
  });

  socket.on('song.played', function(data) {
    io.sockets.emit('song.played');
  });

  socket.on('song.paused', function(data) {
    io.sockets.emit('song.paused');
  });

  socket.on('song.changed', function(data) {
    io.sockets.emit('song.changed', data);
  });
});