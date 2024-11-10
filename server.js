const express = require('express');
const http = require('http');
const socketIo = require('socket.io');

const app = express();
const server = http.createServer(app);
const io = socketIo(server);

app.use(express.static('public'));

// When a client connects
io.on('connection', (socket) => {
  console.log('A user connected');

  // Broadcast uploaded code to all clients
  socket.on('codeUpdate', (code) => {
    socket.broadcast.emit('codeUpdate', code);
  });

  socket.on('disconnect', () => {
    console.log('User disconnected');
  });
});

const PORT = 80;
server.listen(PORT, () => {
  console.log(`Server running on http://localhost:${PORT}`);
});
