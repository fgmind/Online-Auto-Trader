<?php

$type = $_POST['carType'];
$make = $_POST['carMake'];
$model = $_POST['carModel'];
$fromPrice = $_POST['fromPrice'];
$toPrice = $_POST['toPrice'];
$year = $_POST['carYear'];
$mileageFrom = $_POST['mileageFrom'];
$mileageTo = $_POST['mileageTo'];

$where = "";
$first = false;

if($type!="any"){
	if($first == false){
		$where .= "type=:type ";
		$first = true;
	}
}
if($make!="any"){
	if($first == false){
		$where .= "make=:make ";
		$first = true;
	}else{
		$where .= "AND make=:make ";
	}
}
if(!empty($model)){
	if($first == false){
		$where .= "model=:model ";
		$first = true;
	}else{
		$where .= "AND model=:model ";
	}
}
if(!empty($fromPrice)){
	if(!empty($toPrice)){
		if($first == false){
			$where .= "price>=:fromPrice AND price<=:toPrice ";
			$first = true;
		}else{
			$where .= "AND price>=:fromPrice AND price<=:toPrice ";
		}
	}else{
		if($first == false){
			$where .= "price>=:fromPrice ";
			$first = true;
		}else{
			$where .= "AND price>=:fromPrice ";
		}
	}
}else if(!empty($toPrice)){
	if($first == false){
		$where .= "price<=:toPrice ";
		$first = true;
	}else{
		$where .= "AND price<=:toPrice ";
	}
}
if($year != "any"){
	if($first == false){
		$where .= "year=:year ";
		$first = true;
	}else{
		$where .= "AND year=:year ";
	}
}
if(!empty($mileageFrom)){
	if(!empty($mileageTo)){
		if($first == false){
			$where .= "mileage>=:fromPrice AND mileage<=:mileageTo ";
			$first = true;
		}else{
			$where .= "AND mileage>=:fromPrice AND mileage<=:mileageTo ";
		}
	}else{
		if($first == false){
			$where .= "mileage>=:mileageFrom ";
			$first = true;
		}else{
			$where .= "AND mileage>=:mileageFrom ";
		}
	}
}else if(!empty($mileageTo)){
	if($first == false){
		$where .= "mileage<=:mileageTo ";
		$first = true;
	}else{
		$where .= "AND mileage<=:mileageTo ";
	}
}

require_once("header.php");

try{
	require_once("db_connect.php");
	if($where==""){
		$sql = "SELECT * FROM vehicles";
	}else{
		$sql = "SELECT * FROM vehicles WHERE $where";
	}
	$cmd = $conn -> prepare($sql);
	if($type != "any"){ $cmd -> bindParam(":type", $type, PDO::PARAM_STR); }
	if($make != "any"){ $cmd -> bindParam(":make", $make, PDO::PARAM_STR); }
	if(!empty($model)){ $cmd -> bindParam(":model", $model, PDO::PARAM_STR); }
	if(!empty($fromPrice)){ $cmd -> bindParam(":fromPrice", $fromPrice, PDO::PARAM_STR); }
	if(!empty($toPrice)){ $cmd -> bindParam(":toPrice", $toPrice, PDO::PARAM_STR); }
	if($year != "any"){ $cmd -> bindParam(":year", $year, PDO::PARAM_STR); }
	if(!empty($mileageFrom)){ $cmd -> bindParam(":mileageFrom", $mileageFrom, PDO::PARAM_STR); }
	if(!empty($mileageTo)){ $cmd -> bindParam(":mileageTo", $mileageTo, PDO::PARAM_STR); }
	$cmd -> execute();
}catch(Exception $e){
	die($e . $where);
}

$results = $cmd -> fetchAll();

echo "<div class='results'><h3>Results for:</h3> Type: $type <br />Make: $make <br />";
if(!empty($model)){echo "Model: $model <br />"; }
if(!empty($fromPrice)){echo "Price From: $$fromPrice <br />"; }
if(!empty($toPrice)){echo "Price To: $$toPrice <br />"; }
echo "Year: $year <br />";
if(!empty($mileageFrom)){echo "Mileage From: $mileageFrom <br />"; }
if(!empty($mileageTo)){echo "Mileage To: $mileageTo <br />"; }
echo "</div>";

if(count($results)==0){
	echo "<p>Sorry, Your search brought back 0 results. $where<a href='index.php'>Try again</a>";
}

foreach($results as $result){
	$id = $result['id'];
	$name = $result['make'] . " " . $result['model'];
	$price = $result['price'];
	$description = substr($result['description'], 0, 100);
	
	$sql = null;
		$cmd = null;
		
		$sql = "SELECT * FROM images WHERE postid=:id AND thumbnail='1'";
		$cmd = $conn -> prepare($sql);
		$cmd -> bindParam(":id", $id, PDO::PARAM_INT);
		$cmd -> execute();
		
		$images = $cmd -> fetchAll();
			$image = '';
		foreach($images as $thisImage){
			$image = $thisImage['image'];
		}
	
	echo "
	<a href='listing.php?id=$id'>
		<div class='public-listings'>
			<div class='listing-image'><img src='images/$image' alt='$name'></div>
			<div class='listing-name'>$name</div>
			<div class='listing-price'>$$price</div>
			<div class='listing-description'><p>$description</p></div>
		</div>
	</a>
	";
}

?>