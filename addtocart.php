<?php
include('updatecart.php');
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Aliberti.css"/>

</head>
<body>
<div id="wrapper_addtocart" >
<h3 align="center" style="margin-left:-100px;">Your Cart Details !</h3>
<div id="main_content">



<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
//connect to database
$connect = mysqli_connect("localhost", "root", "", "users_orders") or die("Please, check your server connection.");

//Initialize Variables
$message = "";
$quantity="";
$action="";
$query="";
//Take the newest value of quantity
if (isset($_POST['quantity'])) {
  	$quantity = trim($_POST['quantity']);
}
if ($quantity=='')
{
	$quantity=1;
}
if($quantity <=0)
{
	?><script>alert('Quantity value is invalid');</script><?php
	  echo "<form method=\"POST\" style=\"margin-top:12px;\" action=\"categorylist.php\">";

	echo"<input type=\"submit\" name=\"Submit\" style=\"margin-top:100px;font-size:21px; margin-left:510px;\" value=\"Back To Products\"> </form>";
	
	echo"<p align=\"center\" style=\"margin-top:-100px;font-size:21px;\">";
	echo "<b>Quantity value is invalid! ";
	echo "Go Back and enter a valid value!</b>";
	echo"</p>";
}
else
{
	if (isset($_REQUEST['icode'])) {
  		$itemcode = $_REQUEST['icode'];
	}
	if (isset($_REQUEST['iname'])) {
  		$item_name = $_REQUEST['iname'];
	}
	if (isset($_REQUEST['iprice'])) {
  		$price = $_REQUEST['iprice'];
	}
	if (isset($_POST['modified_quantity'])) {
  		$modified_quantity = $_POST['modified_quantity'];
	}
	$sess = session_id();
	if (isset($_REQUEST['action'])) {
		$action = $_REQUEST['action'];
	}
	switch ($action) {
  		case "add":
			$query="select * from cart1 where cart_sess = '$sess' and cart_itemcode like '$itemcode'";
			$result = mysqli_query($connect, $query) or die(mysql_error()); 
			if(mysqli_num_rows($result)==1)
			{
				$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
				$qt=$row['cart_quantity'];
				$qt=$qt + $quantity;
				$query="UPDATE cart1 set cart_quantity=$qt where cart_sess = '$sess' and cart_itemcode like '$itemcode'";
				$result = mysqli_query($connect, $query)  or die(mysql_error());
			}
			else
			{
    				$query = "INSERT INTO cart1 (cart_sess, cart_quantity, cart_itemcode, cart_item_name, cart_price ,item_code) VALUES ('$sess', $quantity, '$itemcode', '$item_name', '$price','$itemcode')";
    				$message = "<div style=\"position:absolute;margin-top:10px;left:640px;\"align=\"center\"><strong>Item added.</strong></div>";
					?>
				<script>alert ("Item incerted successfully!");</script>
				<?php
			}
    			break;

  		case "change":
			if($modified_quantity==0)
			{
    				$query = "DELETE FROM cart1	 WHERE cart_sess = '$sess' and cart_itemcode like '$itemcode'";
    				$message = "<div style=\"width:200px;position:absolute;margin-top:10px;left:640px; margin:auto;\"><strong>Item deleted</strong></div>";
			}
			else
			{
				if($modified_quantity <0)
				{
					echo "Invalid quantity entered";
					?>
				<script>alert ("Quantity could be higher than zero!");</script>
				<?php
				}
				else
				{
    					$query = "UPDATE cart1 SET cart_quantity = $modified_quantity  WHERE cart_sess = '$sess' and cart_itemcode like '$itemcode'";
    					$message = "<div style=\"width:200px;position:absolute;margin-top:10px;left:640px; margin:auto;\"><strong>Quantity changed</strong></div>";
						?>
				<script>alert ("Item updated successfully!");</script>
				<?php
				}
			}
    			break;
  		case "delete":
    			$query = "DELETE FROM cart1 WHERE cart_sess = '$sess' and cart_itemcode like '$itemcode'";
    			$message = "<div style=\"width:200px;position:absolute;margin-top:10px;left:640px; margin:auto;\">Item deleted</div>";
				?>
				<script>alert ("Item deleted successfully!");</script>
				<?php
    			break;
  		case "empty":
    			$query = "DELETE FROM cart1 WHERE cart_sess = '$sess'";
				?>
				<script>alert ("Item deleted successfully!");</script>
				<?php
      			break;
	}
	if($query !="")
	{
		$results = mysqli_query($connect, $query) or die(mysqli_error($connect));
		echo $message;
	}
	include("cartdetails.php");
	echo "<SCRIPT LANGUAGE=\"JavaScript\">updateCart();</SCRIPT>";
}
?>

</div>
</div>
</body>
</html>
