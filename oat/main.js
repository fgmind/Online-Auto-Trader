$(document).ready(function(){
	$('#post-feedback').click(function(){
		$('<div id="post-feedback-div"><textarea id="feedback" placeholder="Provide feedback"></textarea><input type="button" id="post" value="Submit"></div>').insertAfter('#post-feedback');
		$('#post-feedback').remove();
	});
	
	$('#post').click(function(){
		var poster = <?php echo $id; ?>;
		var feedback = $('#feedback').val();
		var recipient = <?php echo $sellerID; ?>;
		
		if($('#feedback').length){
			$.post("post-feedback.php", {poster: poster, feedback: feedback, recipient: recipient}, function(data){
				if(data=="success"){
					alert("Feedback posted successfully");
				}else{
					alert("Something went wrong, please try again");
				}
			});
		}else{
			alert("Please fill out the feedback form.");
		}
	});
});