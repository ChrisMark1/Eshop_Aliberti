<?php

include ('updatecart.php');

?>

<HTML>
<HEAD> 
  <link rel="stylesheet" type="text/css" href="Aliberti.css"/>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script language="JavaScript" type="text/JavaScript">

function cart(){
	
	window.location.href='userinfo.php';
	
}



</script>


    
	
	

</HEAD>
<BODY> 
	<?php

	if (session_status() == PHP_SESSION_NONE) {
    		session_start();
	}
	if (isset($_SESSION['cartamount']))
	{
		$cartamount=$_SESSION['cartamount'];
	}
	$connect = mysqli_connect("localhost", "root", "", "users_orders") or die("Please, check your server connection.");
$email_address= $_SESSION['emailaddress'] ;

	$complete_name=$_POST['complete_name'];
	$address1 = $_POST['address1'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zipcode = $_POST['zipcode'];
	$country = $_POST['country'];
	$shipping_address_line1 = $_POST['shipping_address_line1'];
	$shipping_address_line2 = $_POST['shipping_address_line2'];
	$shipping_city = $_POST['shipping_city'];
	$shipping_state = $_POST['shipping_state'];
	$shipping_country = $_POST['shipping_country'];
	$shipping_zipcode = $_POST['shipping_zipcode'];
	$phone_no= $_POST['phone_no'] ;
	$_SESSION['complete_name'] =$complete_name;
	$_SESSION['address1'] =$address1;
	$_SESSION['city'] =$city;
	$_SESSION['state'] =$state;
	$_SESSION['zipcode'] =$zipcode;
	$_SESSION['country'] =$country;
	$_SESSION['shipping_address_line1'] =$shipping_address_line1;
	$_SESSION['shipping_address_line2'] =$shipping_address_line2;
	$_SESSION['shipping_city'] =$shipping_city;
	$_SESSION['shipping_state'] =$shipping_state;
	$_SESSION['shipping_country'] =$shipping_country;
	$_SESSION['shipping_zipcode'] =$shipping_zipcode;
	$_SESSION['phone_no'] =$phone_no;
	
	

?>


<div id="wrapper_buy">
<h3 align="center"> Complete your payment about your products! </h3>
<div id="main_content">

 	
  	<form action="order.php" method="POST" id="payment-form"  > 
		<input id="token" name="token" type="hidden" value="">
		<table border="0" style="margin-left:-100px;" cellspacing="1" cellpadding="3">
			<tr><td colspan="2" align="center"><br><br></td></tr>
			<tr><td style="font-size:150%;">Please check your credit card to pay:<br><br>
    <div class="cc-selector-2">
        <input id="visa2" type="radio" name="creditcard" value="visa" checked />
        <label class="drinkcard-cc visa" for="visa2"></label>
        <input id="mastercard2" type="radio" name="creditcard" value="mastercard" />
        <label class="drinkcard-cc mastercard"for="mastercard2"></label>
    </div></td></tr>
  			
 			

		</table>
	<div style="margin-left:-100px;">	
		<div class="input-group">
    <span style="font-size:150%;" class="input-group-addon">Card Number&nbsp;<i class="fa fa-credit-card"></i></span>
    <input id="card" type="text" class="form-control"  required name="card-number"  size="16" autocomplete="off" pattern="[0-9]{13,16}" id="card-number" title="Credit Card [No spaces no dashes!] 13-16 digits" value="">
  </div>
  <div class="input-group">
    <span style="font-size:150%;" class="input-group-addon">CVC&nbsp;<i class="fa fa-credit-card-alt"></i></span>
    <input id="cvc" type="text" class="form-control"   required size="4"  name="card-cvc" title="3 or 4 Digit security code" pattern="[0-9]{3,4}" autocomplete="off" id="card-cvc" title="Use 3-4 Digits[No spaces no dashes!]">
  </div>
   <div class="input-group">
    <span style="font-size:150%;" class="input-group-addon">Full Name&nbsp;<i class="glyphicon glyphicon-user"></i></span>
    <input id="name" type="text" class="form-control"   required id="full-name" name="full-name"  pattern="[A-Za-z]{1-15}" size="80" autocomplete="on"  title="Use only Characters [No spaces no dashes!]">
  </div>
  <div class="input-group">
    <span style="font-size:150%;" class="input-group-addon">Expiration (MM/YYYY)&nbsp;<i class="material-icons">date_range</i></i></span>
<input type="number" class="form-control" required size="2" pattern="[0-9]{2}" title="Expiration month 2 digit required"  name="exp-month" min="01" max="12"  id="card-expiry-month" title="Use Two Digits To Correspond Month!" ><input type="number" class="form-control" required size="4" pattern="[0-9]{4}" title="Expiration year 4 digit required" min="2018" max="2048"  name="exp-date" id="card-expiry-year" title="Use Four Digits To Correspond Year!">  
</div>
	<div class="input-group">
    <span style="font-size:150%;" class="input-group-addon">Amount To Pay&nbsp;<i class="fa fa-money"></i> <?php echo $cartamount; ?>&euro;</span>
      
  </div>

<input class="submit" style="margin-left:400px;margin-top:41px;font-size:150%;background-color:rgb(106, 90, 205);color:white;" type="submit" id="submitt" name="submit" value="Submit" >
<input class="submit" style="margin-left:-400px;margin-top:41px;font-size:150%;background-color:rgb(106, 90, 205);color:white;" type="submit" id="submittt" onClick="cart();" name="submit" value="Retutn To User Info" >
 </div> 
 	</form> 
	
</div>
</div>
	
</BODY>
</HTML> 


