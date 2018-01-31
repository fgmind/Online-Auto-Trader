<?php
require_once("db_connect.php");

$poster = $_POST['poster'];
$feedback = $_POST['feedback'];
$recipient = $_POST['recipient'];

$sql = "INSERT INTO feedback (poster, feedback, recipient) VALUES (:poster, :feedback, :recipient)";
$cmd = $conn -> prepare($sql);
$cmd -> bindParam(":poster", $poster, PDO::PARAM_INT);
$cmd -> bindParam(":feedback", $feedback, PDO::PARAM_STR);
$cmd -> bindParam(":recipient", $recipient, PDO::PARAM_INT);

$cmd -> execute();

echo "success";

?>