const WebSocket = require('ws');
const wss = new WebSocket.Server({ port: 80 });

wss.on('connection', function connection(ws) {
  ws.on('message', function incoming(message) {
    // Broadcast received message to all connected clients
    wss.clients.forEach(function each(client) {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(message);
      }
    });
  });
});

console.log("WebSocket server started at ws://localhost:3000");
