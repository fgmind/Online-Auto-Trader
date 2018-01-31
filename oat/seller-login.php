<?php
require_once("header.php");
?>

<h2>Seller Login</h2>
    <p id="p01">Please fill in your user login and password to continue.</p>


<div class="column1"></div>
<div class="article column1">
            <form onSubmit="return checkLogin();" method="post" action="login.php">
				<p> User Login:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="username" maxlength="15" id="sellerLogin"> </p>
                <p> Password :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="password" type="password"; id ="sellerPassword" min="8"> </p>
  				<p style="text-align:center"> <input type="reset"> <input type="submit" onclick="alert('Welcome Back!')"></p><a href="register.php">Register</a>

  

			</form>
              
			</div>

<div class="footer"><p id="footer">Online Auto Trader is a registered company. All rights reserved 2015</p></div>
    

</body>
</html>