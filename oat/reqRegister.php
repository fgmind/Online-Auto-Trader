<?php
ob_start();

$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$first = $_POST['firstname'];
$last = $_POST['lastname'];
$phone = $_POST['phone'];
$address = $_POST['address'];

require_once("db_connect.php");

$sql = "INSERT INTO users (username, password, email, firstname, lastname, phone, address)VALUES(:username, :password, :email, :firstname, :lastname, :phone, :address)";
$cmd = $conn -> prepare($sql);
$cmd -> bindParam(":username", $username, PDO::PARAM_STR);
$cmd -> bindParam(":password", $password, PDO::PARAM_STR);
$cmd -> bindParam(":email", $email, PDO::PARAM_STR);
$cmd -> bindParam(":firstname", $first, PDO::PARAM_STR);
$cmd -> bindParam(":lastname", $last, PDO::PARAM_STR);
$cmd -> bindParam(":phone", $phone, PDO::PARAM_STR);
$cmd -> bindParam(":address", $address, PDO::PARAM_STR);

$cmd -> execute();

header('location: seller-login.php');

ob_flush();