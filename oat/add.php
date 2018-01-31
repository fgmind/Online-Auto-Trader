<?php
ob_start();
session_start();

$username = $_SESSION['username'];
$totalImages = count($_FILES['images']['name']);
$registration = $_POST['registration'];
$type = $_POST['carType'];
$make = $_POST['carMake'];
$model = $_POST['model'];
$price = $_POST['price'];
$year = $_POST['carYear'];
$mileage = $_POST['mileage'];
$description = $_POST['carDescription'];

try{
	require_once("db_connect.php");

	$sql = "SELECT id FROM users WHERE username=:username";
	$cmd = $conn -> prepare($sql);
	$cmd -> bindParam(":username", $username, PDO::PARAM_STR);
	$cmd -> execute();

	$users = $cmd -> fetchAll();
	if(count($users)==0){
		die("Sorry, you are not logged in!");
	}
	foreach($users as $user){
		$sellerID = $user['id'];
	}

	$sql = null;
	$cmd = null;

	$sql = "INSERT INTO vehicles (registration, type, make, model, price, year, mileage, description, sellerID)VALUES(:registration, :type, :make, :model, :price, :year, :mileage, :description, :sellerID)";

	$cmd = $conn -> prepare($sql);
	$cmd -> bindParam(":registration", $registration, PDO::PARAM_STR);
	$cmd -> bindParam(":type", $type, PDO::PARAM_STR);
	$cmd -> bindParam(":make", $make, PDO::PARAM_STR);
	$cmd -> bindParam(":model", $model, PDO::PARAM_STR);
	$cmd -> bindParam(":price", $price, PDO::PARAM_INT);
	$cmd -> bindParam(":year", $year, PDO::PARAM_INT);
	$cmd -> bindParam(":mileage", $mileage, PDO::PARAM_INT);
	$cmd -> bindParam(":description", $description, PDO::PARAM_STR);
	$cmd -> bindParam(":sellerID", $sellerID, PDO::PARAM_INT);

	$cmd -> execute();
}catch(Exception $e){
	die($e);
}

$last = $conn -> lastInsertId();
for($i=0; $i<$totalImages; $i++){
	$screenshotExt = pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);
	$screenshotName = sha1($_FILES['images']['name'][$i] . time() . $username) . "." . $screenshotExt;
	move_uploaded_file($_FILES['images']['tmp_name'][$i], "images/" . $screenshotName);
	
	$sql = null;
	$cmd = null;
	if($i==0){
		$sql = "INSERT INTO images (postid, image, thumbnail) VALUES (:postID, :image, '1')";
	}else{
		$sql = "INSERT INTO images (postid, image, thumbnail) VALUES (:postID, :image, '0')";
	}
	$cmd = $conn -> prepare($sql);
	$cmd -> bindParam(":postID", $last, PDO::PARAM_INT);
	$cmd -> bindParam(":image", $screenshotName, PDO::PARAM_STR);
	$cmd -> execute();
}

header('Location: sellers.php');

ob_flush();