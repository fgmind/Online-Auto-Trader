<?php
ob_start();
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

if(empty($username)){
	die("Sorry, There was no username inserted.");
}

if(empty($password)){
	die("Sorry, There was no password inserted.");
}

require_once("db_connect.php");

$sql = "SELECT * FROM users WHERE username=:username AND password=:password";
$cmd = $conn -> prepare($sql);
$cmd -> bindParam(":username", $username, PDO::PARAM_STR);
$cmd -> bindParam(":password", $password, PDO::PARAM_STR);
$cmd -> execute();

$users = $cmd -> fetchAll();

if(count($users) >= 1){
	$_SESSION['username'] = $username;
	header('location: sellers.php');
	
	ob_flush();
}else{
	die("Username and password do not match.");
}

?>