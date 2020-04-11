<!DOCTYPE html>
<?php


if (session_status() == PHP_SESSION_NONE) {
	session_start();
	
	
}

?>


<html>
  <head>
   <link rel="icon" type="image/png" href="images/aliberti_favicon.jpg" />
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="Aliberti.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="normalize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script language="JavaScript" type="text/JavaScript" src="check_validate_form.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
  </head>
  <body style=" height: 100%;
    margin: 0;
    padding: 0;  overflow-x: hidden;">
<table  width="100%" style="margin-top:-5px;max-width: 720px;  
  min-width: 100%;      " cellspacing="0" cellpadding="2">
	<col style="width:28%">
	<col style="width:18%">
        	<col style="width:21%">
			<col style="width:23%">
			
	<tr><td style="background-color:#0080ff;color:white;"></td><td style="background-color:#0080ff;color:white;"></td><td style="background-color:#0080ff;color:white;">

	<tr><td style="font-size: 25px;color:white;background-color:#0080ff;">
    	<b>Free delivery and shipping!</b></font>
		
	<td style="font-size: 25px;color:white;background-color:#0080ff;">
    	<b>Tel:2106626384-5</b></font></td>
	
		<td style="font-size: 23px;color:white;background-color:#0080ff;">
    	<b>Quarantied Markets</b> <i class="material-icons" style="font-size:29px">check</i></font></td>
		
	
	

		
	
	
	<td bgcolor="#0080ff">
	<form class="example" method="post" action="searchitems.php">
  <input type="text" name="tosearch" size="50" placeholder="Search.." name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
	</td>
	<td bgcolor="#0080ff" ><a href="addtocart.php"><img style="max-width:40px;max-height:40px;width:auto;height:auto;" src="images/cart.jpg"></img><span id="cartcountinfo"></span></a></td></tr>

 <td style="color:white;background-color:#0080ff;width:70px;">  
 &nbsp;&nbsp;&nbsp;&nbsp;
    <button class="btn btn-primary btn-md " style="font-size:21px" onClick="comm();"> <i class="fa fa-location-arrow"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button class="btn btn-primary btn-md " style="font-size:21px" onClick="comm1();"> <i class="fa fa-phone"></i></button>&nbsp;&nbsp;
 
 </td>
 <td style="color:white;background-color:#0080ff;width:70px;"> </td>
  <td style="color:white;background-color:#0080ff;width:70px;"> </td>

   <td style="color:white;background-color:#0080ff;width:70px;"> </td>
 <td style="color:white;background-color:#0080ff;width:70px;"> </td>

	</tr>
	</tr>
	</table>


 <div id="aliberti_icon">
<img style="max-width:230px;max-height:170px;width:auto;height:auto;margin-left:600px;margin-top:1%;" src="images/aliberti_first.jpg">


</div>

<div class="menu-wrap">
    <nav class="menu">
        <ul class="clearfix">
            <li><a href="index.php" style="text-decoration:none;">Home</a></li>
            <li>
                <a href="#" style="text-decoration:none;">Products <span class="arrow">&#9660;</span></a>
 
                <ul class="sub-menu">
                    <li><a href="categorylist.php" style="text-decoration:none;">Switches / Plugs</a></li>
                    <li><a href="itemlist.php?category=Electric_Bell" style="text-decoration:none;">Bells</a></li>
                    <li><a href="itemlist.php?category=Door_Button" style="text-decoration:none;">Door Buttons</a></li>
                    <li><a href="itemlist.php?category=Ventilator" style="text-decoration:none;">Wash Ventilators</a></li>
                </ul>
            </li>
            <li><a href="about.php" style="text-decoration:none;">About Us</a></li>
            <li><a href="communication.php" style="text-decoration:none;">Communication</a></li>
            <li><a href="sitehelp.php" style="text-decoration:none;">Site Help</a></li>
        </ul>
    </nav>
</div>

<div id="aliberti_body">
<img style="max-width: 720px;  min-width: 100%;   max-height:500px;width:auto;height:30%;margin-left:0%;margin-top:100px;" src="images/body.jpg">


</div>
  



<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$connect = mysqli_connect("localhost", "root", "", "customers") or die ("Please, check the server connection.");


// REGISTER USER
if (isset($_POST['register-user'])) {
	
  // receive all input values from the form
$email_address = $_POST['emailaddress'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$completename = $_POST['complete_name'];
$address1 = $_POST['address1'];                                          
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$zipcode = $_POST['zipcode'];
$phone_no = $_POST['phone_no'];


// first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user_identities WHERE email_address='$email_address'";
  $result = mysqli_query($connect, $user_check_query);
  $user = mysqli_fetch_assoc($result);
 if(mysqli_num_rows($result)){
 ?>
        <script>alert('Your Email address is already used!Provide an another Email address');</script>
           <table   width="100%" style="background-color:#0080ff;color:white;margin-left:-44px;margin-top:-816px;max-width: 720px; height:30%; 
  min-width: 100%;       " cellspacing="0" cellpadding="2">
	
	<col style="width:10%">
	
	<col style="width:6%">
	
        	<col style="width:70%">
		<tr>
</tr>
<tr>		
		
		<td>
		<td>
			
		
<td style="color:white;background-color:#0080ff;">  
		

	<button class="btn btn-primary btn-md " href="#signup" data-toggle="modal" data-target=".bs-modal-sm"> Sign In/Register  <i class="material-icons">people_outline</i></button>

	</td>
	<td style="margin-left:300px;color:white;background-color:#0080ff;"></td>
</table>		
 <!-- Modal -->
<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>
              <li class=""><a href="#signup" data-toggle="tab">Register</a></li>
             
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="signin">
            <form  name="frmRegistration" action="loginvalidate.php" method="post">
            <fieldset>
            <!-- Sign In Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="emailaddress">Email:</label>
              <div class="controls">
                <input required="" id="userid" name="emailaddress" type="text" class="form-control" placeholder="JoeSixpack" class="input-medium" required="">
              </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">Password:</label>
              <div class="controls">
                <input required="" id="passwordinput" name="password" class="form-control" type="password" placeholder="********" class="input-medium">
              </div>
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="control-group">
              <label class="control-label" for="rememberme"></label>
              <div class="controls">
                <label class="checkbox inline" for="rememberme-0">
                  <input type="checkbox" name="rememberme" id="rememberme-0" value="Remember me" required>
                  Accept Terms & Conditions
                </label>
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls">
                <button id="signin" name="login-user" class="btn btn-primary">Sign In</button>
              </div>
            </div>
            </fieldset>
            </form>
        </div>
        <div class="tab-pane fade" id="signup">
            <form  name="frmRegistration" action="signupvalidate.php" method="post" onSubmit="return validate_form(this);">
            <fieldset>
            <!-- Sign Up Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="user_name">Complete Name:</label>
              <div class="controls">
                <input id="name" name="complete_name" pattern="[A-Za-z\s]{1-20}" class="form-control" type="text" title="Use Only Characters!" class="input-large" value="<?php if(isset($_POST['complete_name'])) echo $_POST['complete_name']; ?> "required>
              </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">Email:</label>
              <div class="controls">
                <input id="email" name="userid" class="form-control" type="text" placeholder="JoeSixpack" name="emailaddress" value="<?php if(isset($_POST['emailaddress'])) echo $_POST['emailaddress']; ?>" class="input-large" required="">
              </div>
            </div>
            
            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">Password:</label>
              <div class="controls">
                <input id="password" name="password" name="repassword" class="form-control" type="password" placeholder="********" class="input-large" required="">
               
              </div>
            </div>
            
			<!-- REPassword input-->
            <div class="control-group">
              <label class="control-label" for="repassword">Confirm Password:</label>
              <div class="controls">
                <input id="repassword"  name="repassword" class="form-control" type="password" placeholder="********" class="input-large" required="">
             
              </div>
            </div>
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="address1">Address1:</label>
              <div class="controls">
                <input id="address1" class="form-control" pattern="[A-Za-z\s]{1-200}" title="Use Only Characters!" name="address1" type="text"  class="input-large" required="">
              </div>
            </div>
			
			<!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="address2">Address2:</label>
              <div class="controls">
                <input id="address2" class="form-control" pattern="[A-Za-z\s]{1-200}" title="Use Only Characters!" name="address2" type="text"  class="input-large" required="">
              </div>
            </div>
			
			<!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="city">City:</label>
              <div class="controls">
                <input id="city" class="form-control" name="city" pattern="[A-Za-z\s]{1-15}" title="Use Only Characters!" value="<?php if(isset($_POST['city'])) echo $_POST['city']; ?>" type="text"  class="input-large" required="">
              </div>
            </div>
			
			<!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="state">State:</label>
              <div class="controls">
                <input id="state" class="form-control" name="state" pattern="[A-Za-z\s]{1-15}" title="Use Only Characters!" value="<?php if(isset($_POST['state'])) echo $_POST['state']; ?>" type="text"  class="input-large" required="">
              </div>
            </div>
			
			<!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="country">Country:</label>
              <div class="controls">
                <input id="country" class="form-control"  name="country" pattern="[A-Za-z\s]{1-15}" title="Use Only Characters!" value="<?php if(isset($_POST['country'])) echo $_POST['country']; ?>" type="text"  class="input-large" required="">
              </div>
            </div>
			
			<!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="zipcode">Zip Code:</label>
              <div class="controls">
                <input id="zipcode" class="form-control" name="zipcode" pattern="[0-9]{5}" title="Use Only 5 Digits!" value="<?php if(isset($_POST['zipcode'])) echo $_POST['zipcode']; ?>" type="text"  class="input-large" required="">
              </div>
            </div>
			
			<!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="tel_no">Telephone Number:</label>
              <div class="controls">
                <input id="tel_no" class="form-control" name="phone_no" pattern="[0-9]{10}" title="Use Only 10 Digits!" value="<?php if(isset($_POST['phone_no'])) echo $_POST['phone_no']; ?>" type="text"  class="input-large" required="">
              </div>
            </div>
            
            <!-- Multiple Checkboxes (inline) -->
            <div class="control-group">
              <label class="control-label" for="rememberme"></label>
              <div class="controls">
                <label class="checkbox inline" for="rememberme-0">
                  <input type="checkbox" name="rememberme" id="rememberme-0" value="Remember me"required>
                  Accept Terms & Conditions
                </label>
              </div>
            </div>
            
            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <button id="confirmsignup" name="register-user" class="btn btn-primary">Sign Up</button>
              </div>
            </div>
            </fieldset>
            </form>
      </div>
    </div>
      </div>
      <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div>
  </div>
</div>
<div id="wrapper_signval">
<h3 align="center"> Welcome To Our Eshop! Enjoy Our New Products </h3>
<div id="main_content">


  			<?php
		
 }else {
	 $sql = "INSERT INTO user_identities (complete_name, email_address, password, address_line1, address_line2, city, state, zipcode, country, cellphone_no) VALUES ('$completename','$email_address',(PASSWORD('$password')),  '$address1','$address2','$city', '$state', '$zipcode', '$country', '$phone_no')";
    $result = mysqli_query($connect, $sql) or die(mysql_error());
	?>
	
        <script>alert('Your account has created!');</script>
		
        <?php
		
		echo "<a id=\"a1\" style=\"font-size:21px\" href=\"logout.php\"> Log Out <i  class=\"material-icons\">accessibility</i></a>";
		echo"<div id=\"aa\">";
		echo "Welcome <b>" . $completename . "</b><br>to Aliberti Online Shop .<br>"; 
		$_SESSION['emailaddress'] = $_POST['emailaddress'];
		$_SESSION['password'] = $_POST['password'];
		
		echo"</div>";
 }

}
 
  
  

?>















<br>
<br>
<br>


<div id="switches1">
<div id="switches">

<img style="max-width:276px;height:500px;width:auto;height:auto;margin-left:-300px;margin-top:-130px;" src="images/switches.jpg">
<p style="margin-left:-241px; margin-top:51px;"> All new Switches/Plugs with<br> new technologies!</p>
<a href="categorylist.php" style="text-decoration:none;margin-left:-245px; margin-top:400px;">Go to Switches/Plugs</a>

</div>
</div>


<div id="bells1">
<div id="bells">

<img style="max-width:276px;max-height:500px;width:auto;height:auto;margin-left:-300px;margin-top:-130px;" src="images/bell.jpg">
<p style="margin-left:-251px; margin-top:65px;"> All new Home Bells with<br> new technologies!</p>
<a href="itemlist.php?category=Electric_Bell" style="text-decoration:none;margin-left:-245px; margin-top:400px;">Go to Home Bells</a>

</div>
</div>

<div id="door1">
<div id="door">

<img style="max-width:196px;height:200px;width:auto;margin-left:-300px;margin-top:-130px;" src="images/door.jpg">
<p style="margin-left:-285px; margin-top:20px;"> All new Door Bell Buttons<br> with new technologies!</p>
<a href="itemlist.php?category=Door_Button" style="text-decoration:none;margin-left:-255px; margin-top:400px;">Go to Door Bells</a>

</div>
</div>

<div id="bath1">
<div id="bath">

<img style="max-width:196px;height:200px;width:auto;margin-left:-300px;margin-top:-130px;" src="images/bath.jpg">
<p style="margin-left:-285px; margin-top:20px;"> All new Bath Ventilators<br> with new technologies!</p>
<a href="itemlist.php?category=Ventilator" style="text-decoration:none;margin-left:-275px; margin-top:400px;">Go to Bath Ventilators</a>

</div>
</div>
</div>
</div>


<footer class="site-footer122">
       
        <div class="main-footer">
            <div class="container" >
                <div class="row" >
                    <div class="col-md-3">
                        <div class="footer-widget" >
                            <h3 class="widget-title">About Us</h3>
                            <p style="font-size:14px;">
                              Aliberti is a company of advanced manufacturing equipment
							  <br>for electrical equipment on switches, 
							 <br> sockets, ventilators,bells and door buttons,
							  having a 35-year presence <br>in Greece. 
                             </p>							  
							  <ul class="follow-us">
                                <li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i>Facebook</a></li>
                                <li><a href="https://www.twitter.com"><i class="fa fa-twitter"></i>Twitter</a></li>
                            </ul> <!-- /.follow-us -->
                        </div> <!-- /.footer-widget -->
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3 class="widget-title">Why Choose Us?</h3>
                           <p style="font-size:14px;">

                         Aliberti company provides a complete and <br>secure solution
						 for any requirement <br> in electrical systems.
						 All the products <br> of the company are adapted to old <br>constructions
						 without requiring <br> special building reconstructions.
						<br> The 6,100 sq.m factory is fully equipped <br> with state-of-the-art machines,
						 ensuring absolute quality, as the company has ISO 9001,
						 perfect design and accurate delivery of its products.
						 </p>
                        </div> <!-- /.footer-widget -->
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-2" >
                        <div class="footer-widget">
                            <h3 class="widget-title">Useful Links</h3>
                            <ul>
                                
                                <li><a href="about.php">About Us</a></li>
								<li><a href="tell.php">Departments</a></li>
                                <li><a href="communication.php">Communication</a></li>
                                <li><a href="sitehelp">Help</a></li>
                            </ul>
                        </div> <!-- /.footer-widget -->
                    </div> <!-- /.col-md-2 -->
                    <div class="col-md-4">
                        <div class="footer-widget">
                            <h3 class="widget-title">Your Order details</h3>
                            <div class="newsletter">
                                <form action="order_details.php" method="get">
                                    <p>Chick the button below if you want to see your order history .</p>
                                   
                                    <input type="submit" class="s-button" value="Your Orders" name="Submit">
                                </form>
                            </div> <!-- /.newsletter -->
                        </div> <!-- /.footer-widget -->
                    </div> <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.main-footer -->
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span>Copyright &copy; 2018 <a href="#">Aliberti</a> </span>
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.bottom-footer -->
    </footer> <!-- /.site-footer -->


</body>
</html>