<?php
require_once("header.php");
?>

<h2>Seller Registration</h2>
    <p id="p01">For a seller to advertise cars, one must first register first.</p>
    <p id="p01">Please fill in the following fields and submit your details.</p>

<div class="column1"></div>
<div class="article column1">
            <form onSubmit = "return validateForm()" method="post" action="reqRegister.php">
				<p> User Login:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="username" type="text" id = "sellerLogin" maxlength="15" > </p>
                <p> Password :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="password" type="password"; id ="sellerPassword"> </p>
                <p> Email : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="email" type="email"; id="sellerEmail"></p>
                <p> First Name: &nbsp;&nbsp;&nbsp;&nbsp;<input name="firstname" type="text"; id="sellerFirst"></p>
                <p> Last Name: &nbsp;&nbsp;&nbsp;&nbsp;<input name="lastname" type="text"; id="sellerLast"></p>
                <p> Telephone: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="phone" type="tel"; id="sellerPhone"></p>
                <p> Address : <textarea name="address" id="sellerAddress"> </textarea></p>
                
  				<p style="text-align:center"> <input type="reset"> <input type="submit"></p>

  

			</form>
              
			</div>

<div class="footer"><p id="footer">Online Auto Trader is a registered company. All rights reserved 2015</p></div>
    

</body>
</html>
