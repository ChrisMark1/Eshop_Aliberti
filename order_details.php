<?php

include ('updatecart.php');

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Aliberti.css"/>
</head>
<body>

<div id="wrapper_odetails">

<div id="main_content">
<?php
error_reporting(0);
@ini_set('display_errors', 0);
$connect = mysqli_connect("localhost", "root", "", "customers") or die("Please, check your server connection.");
$connect1 = mysqli_connect("localhost", "root", "", "users_orders") or die("Please, check your server connection.");

    $email_address= $_SESSION['emailaddress'] ;
	

		if (session_status() == PHP_SESSION_NONE) {
    			session_start();
		}
		
		if (isset($_SESSION['emailaddress']))
		{
			

			$sql2 ="SELECT complete_name FROM user_identities WHERE email_address='$email_address'";
            $results2 = mysqli_query($connect, $sql2) or die(mysqli_error($connect));
			$row2 = mysqli_fetch_row($results2);
		    $complete_name = $row2[0];
			echo "<table style=\"margin-left:350px;\" border=\"0\">";

echo "<tr>";
			echo "<h3>Your Orders History Mr.Customer  : $complete_name</h3><br>";
			echo "<h3>Order Details</h3><br><br>";
			$sql3 = "Select order_no,item_code ,item_name,quantity,price from orders_details1 where email_address='$email_address' ";
			$results3 = mysqli_query($connect1, $sql3) or die(mysqli_error($connect1));
			
			
			
			 $i=0;
            while($row4 = mysqli_fetch_row($results3)) {
			$i=$i+1;
			echo "Order # $i" ;
			echo "<pre>";
			$item_code = $row4[1];
			$item_name = $row4[2];
			$quantity = $row4[3];
			$price = $row4[4];
			$orderid = $row4[0];
			echo "Order ID :<b>$orderid </b> || <br>Item Code :<b>$item_code </b> || Item Name :<b>$item_name </b>|| Quantity :<b>$quantity </b>|| Item Price :<b>$price </b> <br>";
			echo "<br>";
            echo"</pre>";
            }
			echo "</tr>";
            echo "</table>";


			
		}
		else{
			?><script>alert('You need to log in to show your orders!');</script><?php
			echo "<h3>You need to log in to show your orders!</h3>";?>
			  <div align="center" style="position:absolute;top:120px;left:0px;">
		<h3>Not Logged in yet</h3>
	
		<p>
  		You are currently not logged into our system.<br>
  		You can show <b>order details</b> only if you are logged in.<br>
  		If you have already registered, 
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