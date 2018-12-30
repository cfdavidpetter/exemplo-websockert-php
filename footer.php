<h1>...</h1>

<script>
    $(function (){
        var socket = io("ws://127.0.0.1:3000/");
        
        socket.emit('log', {
            id: $("#dataUserWebSocket_id").val(),
            url: $("#dataUserWebSocket_url").val()
        });

        console.log(socket);
    });
</script>
</body>
</html>