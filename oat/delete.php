<?php
ob_start();
require_once("auth.php");
$postID = $_GET['id'];

require_once("db_connect.php");
$sql = "SELECT * FROM vehicles WHERE id=:id";
$cmd = $conn -> prepare($sql);
$cmd -> bindParam(":id", $postID, PDO::PARAM_INT);
$cmd -> execute();

$posts = $cmd -> fetchAll();

foreach($posts as $post){
	$sellerID = $post['sellerID'];
	if($id != $sellerID){
		header('Location: my-listings.php');
		ob_flush();
	}
}

$sql = null;
$cmd = null;

$sql = "DELETE FROM vehicles WHERE id=:id";
$cmd = $conn -> prepare($sql);
$cmd -> bindParam(":id", $postID, PDO::PARAM_INT);
$cmd -> execute();

header('Location: my-listings.php?success=true');

ob_flush();