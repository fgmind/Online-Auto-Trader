<?php
require_once("header.php");
require_once("auth.php");
?>
    <h2>Welcome to the Seller's Corner!</h2>
   <p id="p01">Add a car to our database</p>

<div class="form">
            <form onSubmit="return checkAddCar()" enctype="multipart/form-data" method="post" action="add.php">
				<p> Images : <a class="chooseFile" onclick="openFileOption('images', 'preview', 'fileNames');">Choose Files</a>
					<span id="fileNames"></span>
					<input type="file" onchange="readImage(this,0);" id="images" name="images[]" multiple="multiple" accept="image/*" style="display:none;" /></p>
				<div id="image-container"></div>
				<p> Registration :&nbsp; <input name="registration" type="text" id="registration" maxlength="6" onc> </p>
                <p> Type : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<select name="carType">
                                <option value="Convertible">Convertible</option>
                                <option value="Coupe">Coupe</option>
                                <option value="Hatchback">Hatchback</option>
                                <option value="Sedan">Sedan</option>
                                <option value="Station Wagon">Station Wagon</option>
                                <option value="SUV">SUV</option>
                                <option value="Ute">Ute</option>
                            </select>

                <p> Make : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<select name="carMake">
                                <option value="Audi">Audi</option>
                                <option value="BMW">BMW</option>
                                <option value="Ford">Ford</option>
                                <option value="Holden">Holden</option>
                                <option value="Honda">Honda</option>
                                <option value="Hyundai">Hyundai</option>
                                <option value="Honda">Honda</option>
                                <option value="Mercedes">Mercedes</option>
                                <option value="Mitsubishi">Mitsubushi</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Subaru">Subaru</option>
                                <option value="Suzuki">Suzuki</option>
                                <option value="Toyota">Toyota</option>
                                
                            </select>
                        </p>
                <p> Model : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="model" type="text" id="carModel"> </p>
                <p> Price : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="price" type="number" id="carPrice" min="0" max="1000000"> </p>
                <p> Year : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<select name="carYear" id="carYear">
                				<option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                        	</select>        
                        </p>
              <p> Mileage :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="mileage" type="number" id="carMileage" min="0" max="500000"> </p>
                <p> Description : &nbsp;<textarea name="carDescription"> </textarea></p>
                
  				<p style="text-align:center"> <input type="reset"> <input type="submit"></p>
  

  

			</form>
</div>

<div class="footer"><p id="footer">Online Auto Trader is a registered company. All rights reserved 2015</p></div>
    
</body>
</html>