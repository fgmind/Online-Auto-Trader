<?php
require_once("header.php");
require_once("auth.php");

$username = $_SESSION['username'];

?>
<h2>My Listings</h2>
<?php
require_once("db_connect.php");
$sql = "SELECT * FROM vehicles WHERE sellerID=:id";
$cmd = $conn -> prepare($sql);
$cmd -> bindParam(":id", $id, PDO::PARAM_INT);
$cmd -> execute();

$listings = $cmd -> fetchAll();

if(count($listings)==0){
	echo "<p>You do not have any listings, <a href='post.php'>Post one NOW</a></p>";
}

echo "<table class='listing-table'><th>Make</th><th>Model</th><th>Year</th><th>Settings</th>";
foreach($listings as $listing){
	$listingID = $listing['id'];
	$make = $listing['make'];
	$model = $listing['model'];
	$year = $listing['year'];
	$price = $listing['price'];
	$type = $listing['type'];
	$mileage = $listing['mileage'];
	$description = $listing['description'];
	
	echo "<tr><td>$make</td><td>$model</td><td>$year</td><td>";
	?>
	<td>
		<form onsubmit="return confirm('Do you really want to delete your listing?')" method="get" action="delete.php">
			<input type="hidden" name="id" value="<?php echo $listingID; ?>">
			<button type="submit">Delete</button>
		</form>
	</td>
	<?php
}
echo "</table>";