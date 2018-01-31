<?php
$title = "Seller's profile";
require_once("header.php");
require_once("db_connect.php");
require_once("auth.php");

$sellerID = $_GET['id'];

$sql = "SELECT * FROM users WHERE id=:id";
$cmd = $conn -> prepare($sql);
$cmd -> bindParam(":id", $sellerID, PDO::PARAM_INT);
$cmd -> execute();

$users = $cmd -> fetchAll();

foreach($users as $user){
	$username = $user['username'];
	$email = $user['email'];
}

$sql = null;
$cmd = null;

$sql = "SELECT * FROM vehicles WHERE sellerID=:id";
$cmd = $conn -> prepare($sql);
$cmd -> bindParam("id", $sellerID, PDO::PARAM_INT);
$cmd -> execute();

$vehicles = $cmd -> fetchAll();

$sql = null;
$cmd = null;
try{
$sql = "SELECT * FROM feedback WHERE recipient=:id";
$cmd = $conn -> prepare($sql);
$cmd -> bindParam(":id", $sellerID, PDO::PARAM_INT);
$cmd -> execute();

$feedback = $cmd -> fetchAll();
}catch(Exception $e){
	echo $e;
}

?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#post-feedback').click(function(){
			//$('<div id="post-feedback-div"><form id="post-feedback-form" method="post"><textarea id="feedback" placeholder="Provide feedback"></textarea><input type="button" id="postFeedback" value="Submit"></form></div>').insertAfter('#post-feedback');
			//$('#post-feedback').remove();
			
			var $form = $('<form>', {method: "post", id: "feedbackForm"});
			var $textarea = $('<textarea>', {id: "feedback", placeholder: "Provide feedback"});
			var $submitButton = $('<input>', {type: "button", id: "submitFeedback", value: "Submit"});
			$form.insertAfter('#post-feedback');
			$textarea.appendTo($form);
			$submitButton.appendTo($form);
			
		});

		$(document).on('click', '#submitFeedback', function(){
			var poster = <?php echo $id; ?>;
			var feedback = $('#feedback').val();
			var recipient = <?php echo $sellerID; ?>;
			var feedbackDiv = $('#feedback').val();

			if(feedbackDiv != ''){
				$.post("post-feedback.php", {poster: poster, feedback: feedback, recipient: recipient}, function(data){
					if(data=="success"){
						$(location).attr('href', '');
					}else{
						alert("Something went wrong, please try again");
					}
				});
			}else{
				alert("Please fill out the feedback form.");
			}
		});
	});
</script>

<main>
	<h1><?php echo $username; ?></h1>
	<h3>Contact: <?php echo $email; ?></h3>
	
	<?php
	foreach($vehicles as $vehicle){
		$vehicleID = $vehicle['id'];
		$name = $vehicle['make'] . " " . $result['model'];
		$price = $vehicle['price'];
		$description = substr($vehicle['description'], 0, 100) . "...";

		$sql = null;
		$cmd = null;

		$sql = "SELECT * FROM images WHERE postid=:id AND thumbnail='1'";
		$cmd = $conn -> prepare($sql);
		$cmd -> bindParam(":id", $vehicleID, PDO::PARAM_INT);
		$cmd -> execute();

		$images = $cmd -> fetchAll();

		foreach($images as $thisImage){
			$image = $thisImage['image'];
		}
		echo "
		<a href='listing.php?id=$vehicleID'>
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
	<div class="feedback">
		<h2>Feedback</h2>
		<?php if($id!=$sellerID){
			echo '<a id="post-feedback">Leave feedback</a>';
		}
		?>
		<?php
		foreach($feedback as $feedbackResult){
			$posterID = $feedbackResult['poster'];
			$feedbackText = $feedbackResult['feedback'];
			
			$sql = "SELECT firstname, lastname FROM users WHERE id=:id";
			$cmd = $conn -> prepare($sql);
			$cmd -> bindParam(":id", $posterID, PDO::PARAM_INT);
			$cmd -> execute();
			
			$posters = $cmd -> fetchAll();
			
			foreach($posters as $poster){
				$name = $poster['firstname'] . " " . $poster['lastname'];
			}
			
			echo "
			<h3>$name</h3>
			<p>$feedbackText</p>
			";
		}
		?>
	</div>
</main>