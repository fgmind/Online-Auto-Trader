<?php 
ob_start(); 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Online Auto Trader homepage</title>

<link href="OAT style.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
<script type="text/javascript">
	function addCar(){
		window.open("post.php")
	}
	
	/*function checkSearch(){
		model = document.getElementById("carModel").value;
		minPrice = document.getElementById("minPrice").value;
		maxPrice = document.getElementById("maxPrice").value;
		minMileage = document.getElementById("minMileage").value;
		maxMileage = document.getElementById("maxMileage").value;
		patt = /^[0-9]+$/;
		
		if (model =="" || minPrice == "" || maxPrice == "" || minMileage == "" || maxMileage == ""){
			alert ("Please select at least 1 option for custom search");
			return false;
		}
		if (minPrice > maxPrice){
			alert("Minimum Price cannot be more than maximun price");
			return false;
		}
		if (minMileage > maxMileage){
			alert("Minimum Mileage cannot be more than maximun mileage");
			return false;
		}
		

		return true;
	}*/
	
	function checkAddCar(){
		x = document.getElementById("registration").value;
		y = document.getElementById("carModel").value;
		z = document.getElementById("carPrice").value;
		w = document.getElementsByName("carDescription").value;
		if (x == "" || y == "" || z == "" || w == "")
		{
			alert("Please Fill in all the fields!");
			return false;
		}
		if (z < 0)
		{
			alert("invalid selling price");
		}
			return true;

	}
	
	function checkLogin(){
		x = document.getElementById("sellerLogin").value;
		y = document.getElementById("sellerPassword").value;
		if (x == "" || y == "")
		{
			alert("Please Fill in all the fields!");
			return false;
		}
		if (y.length < 8){
			alert("Password has to be a minimum of 8 characters");
			return false;
		}
			return true;		
	}
	
	function validateForm(){
		login = document.getElementById("sellerLogin").value;
		pass = document.getElementById("sellerPassword").value;
		email = document.getElementById("sellerEmail").value;
		patt = /^[0-9a-z]+@[0-9a-z]+[\.][(com)|(my)|(net)|(co\.nz)]$/i;
		patt2 = /^0[0-9]+$/;
		fname = document.getElementById("sellerFirst").value;
		lname = document.getElementById("sellerLast").value;
		phone = document.getElementById("sellerPhone").value;
		address= document.getElementById("sellerAddress").value;
		
		if (login=="" || pass=="" || email=="" || fname=="" || lname=="" ||phone=="" || address ==""){
			alert("Please fill in all the fields!");
			return false;			
		}
		if (pass.length < 8){
			alert("Password has to be a minimum of 8 characters");
			return false;
		}

		/*if (patt.test(email) != true){
			alert("invalid email address");
			return false;
		}*/
		/*if (patt2.test(phone) != true || phone.length != 9){
			alert("invalid phone number");
			return false;
		}*/		
		
		return true;

	}
	
	function readImage(input, num){
 				if(num === 10)
				  {
				   return;
				  }
			   var read = new FileReader();
			   var imageDiv = document.getElementById("image-container");
			   if(num === 0){
				imageDiv.innerHTML = '';
			   }

			   if(num < input.files.length){
				 var imageRow = document.createElement("div");
				 var image = document.createElement("img"); 
				read.onload = function( e )
				{
				 image.src = e.target.result;        

				 console.log("LOADED " + num);
				 num = num + 1;
				 readImage(input, num);
				}
				read.readAsDataURL(input.files[num]);
				image.style="max-width:150px;height:110px;padding:10px;float:left;";
				imageDiv.appendChild(imageRow);
				imageRow.appendChild(image);
				console.log("READ");
			   }
			  }
			
			function openFileOption(fileid, imgID, fileNameID)
			  {
			   var fileInput = document.getElementById(fileid);
			   fileInput.click();
			   fileInput.addEventListener('change', function(){
			   if(fileInput.files && fileInput.files[0])
			   {
				var read = new FileReader();

				read.onload = function(e){
				 var img = document.getElementById(imgID);
				 img.src = e.target.result;
				}

				read.readAsDataURL(fileInput.files[0]);
				   var fileName = document.getElementById(fileNameID);
				   var fullPath = document.getElementById(fileid).value;
					if (fullPath) {
						var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
						var filename = fullPath.substring(startIndex);
						if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
							filename = filename.substring(1);
						}
						fileName.innerHTML=filename;
					}
			   }
			  });
			  }


</script>



</head>

<body>
	<h1>Welcome to Online Auto Trader<img src="logo.png"></h1>

    <p id="p00">
    	<a href="index.php"; style="color:blue">Home</a> |
		<a href="list.php" style="color:blue">Buy a Car</a> |
		<a href="<?php if(isset($_SESSION['username'])){ ?>sellers.php<?php }else{ ?>seller-login.php<?php } ?>" style="color:blue">Seller's corner</a> |
		<a href=""; style="color:blue">Contact</a> | 
        <?php if(isset($_SESSION['username'])){ ?><a href="logout.php"; style="color:blue" onclick="alert('You are now logging off.')">Logoff</a><?php }else{ ?> <a href="seller-login.php"; style="color:blue">Login</a> <?php } ?>
	</p>
    <hr>