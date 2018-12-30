<?php

session_start();

if(!isset($_SESSION['user_id']) ){
	header("Location: /exemplo-websockert-php/");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Below</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>

	<!-- WebSocket -->
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="websocket/lib/socket.io.js"></script>
	<!-- WebSocket -->
</head>
<body>

	<div id="dataUserWebSocket">
		<input type="hidden" id="dataUserWebSocket_id" value="<?=$_SESSION['user_id'];?>">
		<input type="hidden" id="dataUserWebSocket_url" value="<?=$_SERVER['REQUEST_URI'];?>">
	</div>

	<div class="header">
		<a href="/exemplo-websockert-php/p1.php">page 1</a>
		<a href="/exemplo-websockert-php/p2.php">page 2</a>
		<a href="/exemplo-websockert-php/p3.php">page 3</a>
	</div>