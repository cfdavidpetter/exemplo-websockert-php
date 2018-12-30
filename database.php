<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'test_websocket';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}