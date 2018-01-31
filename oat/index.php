<?php
require_once("header.php");
?>
<h2>Who We Are</h2>
    <p id="p01">We are a registered Online Company that specialises in offering a platform for prospect customers to find a used car with sellers who want to sell theirs.<br>
    We pride ourselves in offering the best available website to list and find what you're after!</p>


<div class="column1"></div>


<div class="column1" align="left">
    <h3>Search for a car</h3>
    <p><a href="list.php" style="color:white">List all</a></li></p>
    
    <form onSubmit="return checkSearch()" method="post" action="search.php">
                    <p> Type : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    		<select name="carType">
                                <option value="any" id="any">Any</option>
                                <option value="Convertible" id="Convertible">Convertible</option>
                                <option value="Coupe" id = "Coupe">Coupe</option>
                                <option value="Hatchback"id = "Hatchback">Hatchback</option>
                                <option value="Sedan" id="Sedan">Sedan</option>
                                <option value="Station Wagon" id="station">Station Wagon</option>
                                <option value="SUV" id="Suv">SUV</option>
                                <option value="Ute" id="Ute">Ute</option>
                            </select>

                <p> Make : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<select name="carMake">
                                <option value="any" id="any">Any</option>
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
                <p> Model : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="carModel" type="text" id="carModel"> </p>
                <p> Price : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                from: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="fromPrice" type="number" id="minPrice" min="0" max="1000000"> <br>
                to: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="toPrice" type="number" id="maxPrice" min="0" max="1000000"></p>
                <p> Year : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<select name="carYear" id="carYear">
                                <option value="any" id="any">Any</option>
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
              <p> Mileage :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
              from: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="mileageFrom" type="number" id="minMileage" min="0" max="500000"> <br>
			  to: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="mileageTo" type="number" id="maxMileage" min="0" max="500000"> </p>
                
  				<p style="text-align:center"> <input type="reset"> <input type="submit"></p>
  
			</form>

</div>

<div class="column2" align="right">
    <h3>Where We Are:</h3>
    <p id="p02">145 Kensington Road</p>
    <p id="p02"> Petone, Wellington</p>
    <p id="p02"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3000.847993447393!2d174.88185384582482!3d-41.225082916828036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d38abb917b068dd%3A0xf52cf7df592bcddb!2sKensington+Ave%2C+Petone%2C+Lower+Hutt+5012!5e0!3m2!1sen!2snz!4v1459715546336" width="300" height="250" frameborder="0" style="border:0" allowfullscreen></iframe> </p>
    </div>


<div class="footer"><p id="footer">Online Auto Trader is a registered company. All rights reserved 2015</p></div>



</body>


</html>