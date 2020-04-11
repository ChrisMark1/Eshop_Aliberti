<?php
include('updatecart.php');
error_reporting(0);
@ini_set('display_errors', 0);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Aliberti.css"/>

</head>
<body>
<div id="wrapper_check">
<h3 align="center">Proccess your products!</h3>
<div id="main_content">


<?php

if (session_status() == PHP_SESSION_NONE) {
    	session_start();
}
$connect = mysqli_connect("localhost", "root", "", "users_orders") or die("Please, check your server connection.");
$connect1 = mysqli_connect("localhost", "root", "", "customers") or die("Please, check your server connection.");
$cartamount=0;
$cartamount = $_POST['cartamount'];
$_SESSION['cartamount']=$cartamount;

if (isset($_SESSION['password']))
{
	$password=$_SESSION['password'];
}
if ((isset($_SESSION['emailaddress']) && $_SESSION['emailaddress'] != "") ||   (isset($_SESSION['password']) && $_SESSION['password'] != "")) {
	$sess = session_id();
	$query="select * from cart1 where cart_sess = '$sess'";
	
	$result = mysqli_query($connect, $query) or die(mysqli_error($connect)); 
	if(mysqli_num_rows($result)>=1)
	{
		echo "<table style=\"background-color:grey;\"width=\"100%\" height=\"70%\" cellspacing=\"0\" cellpadding=\"5\">";
        echo "<div id=\"a4\" style=\"position:absolute;top:100px;left:510px;font-size:15px;\" >";
		echo "If you have finished Shopping Click <b> Proceed </b> to supply Shipping Information";
		echo " <br> Or You can do more purchasing by selecting items from the menu. ";
		echo "</div>";
		echo "<form method=\"POST\" action=\"addtocart.php\">";
        echo "<tr><td  colspan=\"2\"><input type=\"submit\" name=\"back\" value=\"Return To Cart\" style=\"font-size:150%;margin-top:160px;position:absolute;left:490px;background-color:rgb(106, 90, 205);color:white;\">";
        echo"  </form>";
		echo "<form method=\"POST\" action=\"userinfo.php\">";
        echo "<tr><td  colspan=\"2\"><input type=\"submit\" name=\"buynow\" value=\"Proceed\" style=\"font-size:150%;margin-top:160px;position:absolute;left:910px;background-color:rgb(106, 90, 205);color:white;\">";
        echo"  </form>";
        echo "</tr></table></table>";
	}
	else
	{
		echo "You can do purchasing by selecting items from the menu on left side";
	}
}
else
{
?>
	<script>alert('You can do purchasing only if you are logged in!');</script>
	  <div align="center" style="position:absolute;top:120px;left:160px;">
		<h3 >Not Logged in yet</h3>
		<p>
  		You are currently not logged into our system.<br>
  		You can do purchasing only if you are logged in.<br>
  		If you have already registered, click the button below to <br>   <b>login </b> or <b> register. </b>
		
		<div class="container" id="container"> 
    <button class="btn btn-primary btn-md" href="#signup" data-toggle="modal" data-target=".bs-modal-sm">Sign In/Register</button>
  </center>
  <br>
    
 </div>
		</p>
		</div>
	
<?php
}
?>
</div>
</div>

</body>
</html>