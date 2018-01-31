<?php
if(!isset($_SESSION['username'])){
	header('Location: index.php');
	exit();
}
$username = $_SESSION['username'];
require("db_connect.php");
$sql = "SELECT * FROM users WHERE username=:username";
$cmd = $conn -> prepare($sql);
$cmd -> bindParam(":username", $username, PDO::PARAM_STR);
$cmd -> execute();

$users = $cmd -> fetchAll();

if(count($users)==0){
	header('Location: index.php');
	exit();
}

foreach($users as $user){
	$id = $user['id'];
	$firstname = $user['firstname'];
	$lastname = $user['lastname'];
}

$cmd = null;
$sql = null;

?>