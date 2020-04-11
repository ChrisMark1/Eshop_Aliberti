
<?php
include('updatecart.php');

?>
<!DOCTYPE HTML>
<html>
<head>

<script language="JavaScript" type="text/JavaScript">

function cart(){
	
	window.location.href='addtocart.php';
	
}



</script>

</head>
<body>

<?php
if (session_status() == PHP_SESSION_NONE) {
    	session_start();
}
if (isset($_SESSION['cartamount']))
{
	$cartamount=$_SESSION['cartamount'];
}

$connect1 = mysqli_connect("localhost", "root", "", "customers") or die("Please, check your server connection.");
$email_address="";
if (isset($_SESSION['emailaddress'])) 
{
	$email_address=$_SESSION['emailaddress'];
}
if (isset($_SESSION['password'])) 
{
	$password=$_SESSION['password']; 
}
if ((isset($_SESSION['emailaddress']) && $_SESSION['emailaddress'] != "") ||   (isset($_SESSION['password']) && $_SESSION['password'] != "")) {
	$query = "SELECT * FROM user_identities  where email_address like '$email_address' and password like (PASSWORD('$password'))";

	$results1 = mysqli_query($connect1, $query) or die(mysql_error()); 

	$row1 = mysqli_fetch_array($results1, MYSQLI_ASSOC);

 	extract($row1);



?>
  <div id="wrapper_review">
<h3 align="center">Review of your information!<br></h3>
<div id="main_content_buy">
	
  
  	
	 <form action="buy.php" method="post">
  <div class="input-group">
    <span class="input-group-addon">Email&nbsp;<i class="fa fa-envelope"></i></span>
    <input id="email" type="text" class="form-control" size="20" type="text" name="email_address" value="<?php echo $email_address; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Complete Name&nbsp;<i class="glyphicon glyphicon-user"></i></span>
    <input id="name" type="text" class="form-control" size="50" type="text" name="complete_name" value="<?php echo $complete_name; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Address 1&nbsp;<i class="material-icons">location_on</i></span>
    <input id="address1" type="text" class="form-control" size="80"  name="address1" value="<?php echo $address_line1; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Address 2&nbsp;<i class="material-icons">location_on</i></span>
    <input id="address2" type="text" class="form-control" size="80"  name="address2" value="<?php echo $address_line2; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">City&nbsp;<i class="material-icons">location_city</i></span>
    <input id="city" type="text" class="form-control" size="30"  name="city" value="<?php echo $city; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">State&nbsp;<i class="material-icons">location_city</i></span>
    <input id="state" type="text" class="form-control" size="30"  name="state" value="<?php echo $state; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Country&nbsp;<i class="material-icons">location_city</i></span>
    <input id="country" type="text" class="form-control" size="30"  name="country" value="<?php echo $country; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Zip Code&nbsp;<i class="fa fa-address-book"></i></span>
    <input id="zip" type="text" class="form-control" size="20"  name="zipcode" value="<?php echo $zipcode; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Phone_No&nbsp;<i class="fa fa-phone"></i></span>
    <input id="phone" type="text" class="form-control" size="30" name="phone_no" value="<?php echo $cellphone_no; ?>">
  </div>
  <br><br>
  <span style="font-size:21px;"><b>Please update shipping information if different from the shown below:</b></span>
  <br><br>
  <div class="input-group">
    <span class="input-group-addon">Address1 To Deliver At&nbsp;<i class="material-icons">edit_location</i></i></span>
    <input id="address1" type="text" class="form-control" size="80"  name="shipping_address_line1" value="<?php echo $address_line1; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Address2 To Deliver At&nbsp;<i class="material-icons">edit_location</i></span>
    <input id="address1" type="text" class="form-control" size="80"  name="shipping_address_line2" value="<?php echo $address_line2; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">City&nbsp;<i class="material-icons">location_city</i></span>
    <input id="city" type="text" class="form-control" size="30"  name="shipping_city" value="<?php echo $city; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">State&nbsp;<i class="material-icons">location_city</i></span>
    <input id="state" type="text" class="form-control" size="30"  name="shipping_state" value="<?php echo $state; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Country&nbsp;<i class="material-icons">location_city</i></span>
    <input id="country" type="text" class="form-control" size="30"  name="shipping_country" value="<?php echo $country; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Zip Code&nbsp;<i class="fa fa-address-book"></i></span>
    <input id="zip" type="text" class="form-control" size="20"  name="shipping_zipcode" value="<?php echo $zipcode; ?>">
  </div>
  <input type="reset"  style="margin-left:150px;margin-top:35px;font-size:150%;background-color:rgb(106, 90, 205);color:white;" onClick = "cart();" name="submit" value="Return to cart">  </td><td>
	<input type="submit" style="margin-left:290px;margin-top:35px;font-size:150%;background-color:rgb(106, 90, 205);color:white;" name="submit" value="Supply Payment Information">
</form> 
	
	
	
	
	
	
	
	
	
	</div>
	</div>
<?php
}
?>
</body>
</html>

