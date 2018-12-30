const server = require('http').createServer();
const io = require('socket.io')(server);

let clients = [];

io.on('connection', client => {
    
    client.on('log', data => {
        let dataCliente  = {
            id: data.id,
            id_connection: client.id,
            url: data.url,
        };
        
        clients.push(dataCliente);
        client.broadcast.emit('userConnection', clients);
    });
    
    client.on('disconnect', () => {
        for (let index = 1; index <= clients.length; index++) {
            if (clients[index-1].id_connection == client.id) {
                clients.splice(index-1, index);
            }
        }
        console.log(clients);
        
        client.broadcast.emit('userDisconnect', client.id);
    });

    console.log(clients);
    console.log('---------------------------------------------------');
});

server.listen(3000);
console.log('Start Socket::3000');
