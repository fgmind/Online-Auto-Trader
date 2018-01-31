<?php
if(!isset($_GET['page'])){
	$page = 1;
}else{
	$page = $_GET['page'];
}
$limit = ($page * 20) - 20;
require_once("header.php");

require_once("db_connect.php");
$sql = "SELECT * FROM vehicles LIMIT $limit, 20";
$cmd = $conn -> prepare($sql);
$cmd -> execute();
$results = $cmd -> fetchAll();

?>
<h2>Public listings</h2>
<table class="public-listings-table">
	<?php
	foreach($results as $result){
		$id = $result['id'];
		$name = $result['make'] . " " . $result['model'];
		$price = $result['price'];
		$description = substr($result['description'], 0, 100) . "...";
		
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
	$sql = null;
	$cmd = null;
	
	$sql = "SELECT * FROM vehicles";
	$cmd = $conn -> prepare($sql);
	$cmd -> execute();
	$amount = count($cmd -> fetchAll());
	
	echo $amount;
	$pages = $amount/20;
?>
</table>
<div class="pages">
	<?php
	for ($i=0;$i<$pages;$i++){
		?>
	<div class="page-number"><a class="page-button<?php if(($i+1)==$page){echo" active"; } ?>" href="?page=<?php echo $i+1; ?>"><?php echo $i+1; ?></a></div>
		<?php
	}
	?>
</div>