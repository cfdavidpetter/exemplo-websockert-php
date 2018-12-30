<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Logs com WebSocket</title>
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
	<style>
		body{
			margin:0px;
			padding:0px;
			font-family: 'Comfortaa', cursive;
			text-align:center;
		}
		.header{
			border-bottom:1px solid #eee;
			padding:10px 0px;
			width:100%;
			text-align:center;
		}

		.header a{
			color:#333;
			text-decoration: none;
		}
		#logs {
			padding: 10px;
		}
		.card {
			box-shadow: 0 1px 8px 0 rgba(0,0,0,0.2);
			transition: 0.3s;
			float: left;
			text-align: left;
			margin: 10px;
		}
		.card:hover {
			box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
		}
		.container {
			padding: 2px 5px;
		}
		h4, p {
			margin: 5px;
		}
	</style>

	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="lib/socket.io.js"></script>
	<script>
		$(function (){
			var socket = io("ws://127.0.0.1:3000/");

			socket.on('userConnection', function(data) {
				let datas = [];

				//User
				data.forEach(element => {
					datas[element.id] = {
						id: element.id,
						name: '',
						obj: []
					};
				});

				//Pag
				data.forEach(element => {
					datas[element.id].obj.push(element);
				});

				//Del user zero pag.
				datas.forEach((element, i) => {
					if (element.obj.length == 0) return;
				});

				// for (let index = 1; index <= datas.length; index++) {
				// 	if (datas[index-1].obj.length == 0) {
				// 		datas.splice(index-1, index);
				// 	}
				// }
				
				
				$("#logs").html('');
				datas.forEach(element => {
					let data = '';
					element.obj.forEach(element => {
						data = data+'<p id="'+element.id_connection+'">'+element.url+'</p>';
					});

					$('#logs').append(`
						<div id="`+element.id+`" class="card">
							<div class="container">
								<h4><b>`+element.id+`</b></h4>
								`+data+`
							</div>
						</div>
					`);
				});
			});

			socket.on('userDisconnect', function(data) {
				$('#'+data).remove();
			});
		});
	</script>
</head>
<body>

	<div class="header">
		<a href="#">Sistema de Logs com WebSocket</a>
	</div>

	<div id="logs">
	</div>

</body>
</html>