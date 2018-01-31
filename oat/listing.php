<?php
$id = $_GET['id'];
require_once("header.php");

try{
	require_once("db_connect.php");

	$sql = "SELECT * FROM vehicles WHERE id=:id";
	$cmd = $conn -> prepare($sql);
	$cmd -> bindParam(":id", $id, PDO::PARAM_INT);
	$cmd -> execute();
}catch(Exception $e){
	die($e);
}

$listings = $cmd -> fetchAll();
if(count($listings)==0){
	echo "<p>Sorry, there is no listing here!</p>";
}

$sql = null;
$cmd = null;

foreach ($listings as $listing){
	$userID = $listing['sellerID'];
	try{
		$sql = "SELECT * FROM users WHERE id=:id";
		$cmd = $conn -> prepare($sql);
		$cmd -> bindParam(":id", $userID, PDO::PARAM_INT);
		$cmd -> execute();
	}catch(Exception $e){
		die($e);
	}
	$users = $cmd -> fetchAll();
	foreach($users as $user){
		$userID = $user['id'];
		$username = $user['username'];
		$firstname = $user['firstname'];
		$lastname = $user['lastname'];
		$email = $user['email'];
		$phone = $user['phone'];
	}
	
	$sql = null;
	$cmd = null;

	$sql = "SELECT * FROM images WHERE postid=:id";
	$cmd = $conn -> prepare($sql);
	$cmd -> bindParam(":id", $id, PDO::PARAM_INT);
	$cmd -> execute();

	$images = $cmd -> fetchAll();

	echo "<div class='form'><div class='description'><h1>" . $listing['make'] . " " . $listing['model'] . "</h1>";
	echo "<small style='color:#eee;'>By: <a href='user?id=$userID'>" . $firstname . " " . $lastname . "</a></small>";
	echo "<p>Year: " . $listing['year'] . "<br />Price: $" . $listing['price'] . "<br />Phone: " . $phone . "&nbsp;&nbsp;Email: " . $email;
	echo "<br />" . $listing['description'] . "</div><div class='images'>";
	foreach($images as $thisImage){
		$image = $thisImage['image'];
		echo "<img src='images/$image' class='image'>";
	}
	echo "</div></div>";
}