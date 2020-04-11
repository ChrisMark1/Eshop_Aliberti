
<html>
<head>
<link rel="stylesheet" type="text/css" href="Aliberti.css"/>

</head>
<body style=" height: 100%;
    margin: 0;
    padding: 0;  overflow-x: hidden;">





<?php
if ( ! isset($totalamount)) {
   	$totalamount=0;
}
$totalquantity=0;
if (!session_id()) {
  	session_start();
}
$connect = mysqli_connect("localhost", "root", "", "users_orders") or die("Please, check your server connection.");
$sessid = session_id();
$query = "SELECT * FROM cart1 WHERE cart_sess = '$sessid'";
$results = mysqli_query($connect, $query) or die (mysql_query());
if(mysqli_num_rows($results)==0)
{
	echo "<div style=\"width:200px; position:absolute; top:150px; left:500px; margin:auto;\"><img src=\"images/cart-empty.jpg\"></div> ";
	
  	
}
else
{ 
?>
	<table border="1" align="center" cellpadding="5" width="1200px;" style="position:absolute;top:190px;left:93px;">
  	<tr><td style = "background-color:rgb(106, 90, 205);font-size:19px;color:white;width:140px;"> Item Code </td><td style = "background-color:rgb(106, 90, 205);font-size:19px;color:white;width:140px;"> Quantity </td><td style = "background-color:rgb(106, 90, 205);font-size:19px;color:white;width:250px;"> Item Name </td><td style = "background-color:rgb(106, 90, 205);font-size:19px;color:white;width:140px;"> Price </td><td style = "background-color:rgb(106, 90, 205);font-size:19px;color:white;width:240px;"> Total Price </td><td style = "background-color:rgb(106, 90, 205);font-size:19px;color:white;width:240px;"> Stock Quantity </td>
<?php
	while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
  		extract($row);

  		echo "<tr><td style=\"width:150px;font-size:17px;\">";
  		echo $cart_itemcode;
  		echo "</td>";
  		echo "<td> <form method=\"POST\" action=\"addtocart.php?action=change&icode=$cart_itemcode\"> <input type=\"text\" name=\"modified_quantity\" style=\"width:100px;font-size:17px;\"  size=\"2\" value=\"$cart_quantity\">";
  		echo "</td><td style=\"width:80px;font-size:17px;\">";
  		echo $cart_item_name;
  		echo "</td><td td style=\"width:80px;font-size:17px;\">";
  		echo $cart_price; ?>&euro;<?php
  		echo "</td><td style=\"width:80px;font-size:17px;\">";
		$totalquantity = $totalquantity + $cart_quantity;
  		$totalprice = number_format($cart_price * $cart_quantity, 2);
		$totalamount=$totalamount + ($cart_price * $cart_quantity);
  		echo $totalprice;?>&euro;<?php
  		echo "</td><td style=\"width:80px;font-size:17px;\">";
		$sql4 = "SELECT quantity FROM products1 WHERE item_name = '$cart_item_name'";
			$insert1 = mysqli_query($connect, $sql4) or die(mysqli_error($connect)); 
			$row3 = mysqli_fetch_row($insert1);
			
			$quantity  = $row3[0];
			
  		    echo "  # ".$quantity ;
  		    echo "</td><td>";
  		echo "<input type=\"submit\" name=\"Submit\" style=\"margin-top:20px; margin-left:10px;font-size:15px;background-color:rgb(106, 90, 205);color:white;\" value=\"Change quantity\"> </form></td>";
  		echo "<td>";
  		echo "<form method=\"POST\" style=\"margin-top:12px;\" action=\"addtocart.php?action=delete&icode=$cart_itemcode\">";
  		echo "<input type=\"submit\" name=\"Submit\" style=\"margin-top:10px; margin-left:10px;font-size:15px;background-color:rgb(106, 90, 205);color:white;\" value=\"Delete Item\"> </form></td></tr>";
		$query1 = "SELECT category FROM products1 WHERE item_code = '$cart_itemcode'";
        $results1 = mysqli_query($connect, $query1) or die (mysql_query());
	    $row1 = mysqli_fetch_row($results1);
		$category = $row1[0];

	}
	echo "<tr><td style=\"width:80px;font-size:17px; background-color:rgb(106, 90, 205);color:white;\">Total</td><td style=\"width:80px;font-size:17px;background-color:rgb(106, 90, 205);color:white;\">$totalquantity</td><td></td><td ></td><td style=\"width:80px;font-size:17px; background-color:rgb(106, 90, 205);color:white;\">";
  	$totalamount = number_format($totalamount, 2);
	echo $totalamount;?>&euro;<?php
	
	echo "</td></tr>";
	echo "</table><br>";
	echo "<div style=\"width:400px;position:absolute;top:140px;left:520px; margin:auto;\"><b>You currently have " . $totalquantity . " product(s) selected in your cart!</b></div> ";
echo "<form method=\"POST\" style=\"margin-top:12px;\" action=\"itemlist.php?category=$category\">";
  		echo "<input type=\"submit\" name=\"Submit\" style=\"margin-top:42px; margin-left:93px;font-size:150%;background-color:rgb(106, 90, 205);color:white;\" value=\"Back To Products\"></button> </form>";
?>
	<table border="0" style="margin:auto;">
	<tr><td  style="padding: 10px;">
	<form method="POST" style="position:absolute;top:130px;left:350px;" action="addtocart.php?action=empty">
		<input type="submit" name="Submit"  value="Empty Cart" style="font-family:verdana; font-size:150%;background-color:rgb(106, 90, 205);color:white;" > 
	</form>
	</td><td>
	<form method="POST" style="position:absolute;top:130px;left:950px;" action="sessioncheck.php">
		<input id="cartamount" name="cartamount" type="hidden" value= "<?php echo $totalamount ; ?>">
		<input type="submit" name="Submit" value="Checkout"  style="font-family:verdana; font-size:150%;background-color:rgb(106, 90, 205);color:white;" >
	</form>
	</td></tr></table>
<?php
}
?>

</body>
</html>

