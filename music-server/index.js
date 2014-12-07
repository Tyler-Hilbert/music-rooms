var app = require('express')();
var redis = require('redis');
var server = require('http').Server(app);
var io = require('socket.io')(server);

server.listen(3000);

io.on('connection', function(socket) {
  redisClient = redis.createClient();
  redisClient.subscribe('messages.create');

  redisClient.on('message', function(channel, message) {
    socket.emit(channel, message);
  });

  socket.on('disconnect', function() {
    redisClient.quit();
  });
});