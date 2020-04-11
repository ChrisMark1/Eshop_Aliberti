<?php

include ('updatecart.php');

?>


<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" type="text/css" href="Aliberti.css"/>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
  </head>
  <body>

  
  
  <div id="wrapper_order">
<h3 align="center"> Order Results </h3>
<div id="main_content">
<?php
error_reporting(0);
@ini_set('display_errors', 0);
if (session_status() == PHP_SESSION_NONE) {
    	session_start();
}
if (isset($_SESSION['cartamount']))
{
	$cartamount=$_SESSION['cartamount'];
}
$connect = mysqli_connect("localhost", "root", "", "users_orders") or die("Please, check your server connection.");
$connect1 = mysqli_connect("localhost", "root", "", "customers") or die("Please, check your server connection.");
$address1 = $_SESSION['address1'];
$complete_name=$_SESSION['complete_name'];

$city = $_SESSION['city'];
$state = $_SESSION['state'];
$zipcode = $_SESSION['zipcode'];
$country = $_SESSION['country'];
$shipping_address_line1 = $_SESSION['shipping_address_line1'];
$shipping_address_line2 = $_SESSION['shipping_address_line2'];
$shipping_city = $_SESSION['shipping_city'];
$shipping_state = $_SESSION['shipping_state'];
$shipping_country = $_SESSION['shipping_country'];
$shipping_zipcode = $_SESSION['shipping_zipcode'];
$phone_no= $_SESSION['phone_no'] ;
$email_address= $_SESSION['emailaddress'] ;
$today = date("Y-m-d");
$sessid = session_id();
	 

$sql2 ="SELECT complete_name FROM user_identities WHERE email_address='$email_address'";
$results2 = mysqli_query($connect1, $sql2) or die(mysqli_error($connect1)); 
$sql6 ="SELECT email_address FROM user_identities WHERE complete_name='$complete_name'";
$results6 = mysqli_query($connect1, $sql6) or die(mysqli_error($connect1)); 

$idag = date("dmY");
    $a = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 4);
     $orderid = $idag . $a;
$totalamount=0;


    	$full_name = $_POST['full-name'];
        $card_number = $_POST['card-number'];
		$exp_date = $_POST['exp-date'];
		$exp_month =$_POST['exp-month'];
		$payment_type =$_POST['creditcard'];


        		
        		
		$query = "SELECT * FROM cart1 WHERE cart_sess='$sessid'";
		$query1 = "SELECT * FROM cart1 WHERE cart_sess='$sessid'";
		$results = mysqli_query($connect, $query) or die(mysqli_error($connect)); 
		$results1 = mysqli_query($connect, $query1) or die(mysqli_error($connect)); 

		$i= 0;
		$j= 0;
		$count =0 ;

		while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
  			extract($row);
			$count =mysqli_num_rows($results) ;
			$sql4 = "SELECT quantity FROM products1 WHERE item_name = '$cart_item_name'";
			$insert1 = mysqli_query($connect, $sql4) or die(mysqli_error($connect)); 
			$row3 = mysqli_fetch_row($insert1);
			$quantity  = $row3[0];
			$cart_quantity1 = $quantity - $cart_quantity;
			if($quantity>=0 && $quantity>=$cart_quantity1 && $cart_quantity1>=0){
				$i=$i+1;
			}
		}
			
            if($i<$count){
				
				?><script>alert('Please change quantity of this product to procceed your order!');</script>
				<br>
				<br>
				<br>
				
				<div id='error-page'>
                   <div id='error-inner'>
                <h1> I told you to text your mom</h1>
                   <div class="pesan-eror">404</div>
                <p class="balik-home"><a href="addtocart.php" >Change Your Product!</a></p><br/>
				<p class="balik-home1"><a href="index.php" >Back To Home Page!</a></p><br/>
                   </div>
                </div>
				
				
				
			<?php
			
			}
$k=0;
			if($i==$count){
            while ($row1 = mysqli_fetch_array($results1, MYSQLI_ASSOC)) {
  			extract($row1);
			$count1 =mysqli_num_rows($results1) ;
			$sql4 = "SELECT quantity FROM products1 WHERE item_name = '$cart_item_name'";
			$insert1 = mysqli_query($connect, $sql4) or die(mysqli_error($connect)); 
			$row3 = mysqli_fetch_row($insert1);
			$quantity  = $row3[0];
			$k=$k+1;
			$cart_quantity1 = $quantity - $cart_quantity;
			if($quantity>=0){
				
			

				
				
		    $sql5 = "UPDATE products1 SET quantity ='$cart_quantity1' WHERE item_name ='$cart_item_name'";
		    $insertpayment1 = mysqli_query($connect, $sql5) or die(mysqli_error($connect)); 

		if($quantity >=$cart_quantity ){
		
		
        
			$j = $j+1;
			$totalamount=$totalamount + ($cart_price * $cart_quantity);
			$row2 = mysqli_fetch_row($results2);
			$row6 = mysqli_fetch_row($results6);

		$sql2 = "INSERT INTO orders_details1 (order_no, item_code, item_name, quantity, price ,email_address)
             				VALUES ('$orderid','$cart_itemcode','$cart_item_name','$cart_quantity','$cart_price','$email_address')";
			$insert = mysqli_query($connect, $sql2) or die(mysqli_error($connect));
		if($k==$count1){
		
		$sql = "INSERT INTO orders1 (order_no,order_date, email_address, customer_name ,  shipping_address_line1, shipping_address_line2, shipping_city, shipping_state, shipping_country, shipping_zipcode)
           VALUES ('$orderid','$today','$email_address', '$complete_name','$shipping_address_line1', '$shipping_address_line2', '$shipping_city','$shipping_state','$shipping_country','$shipping_zipcode')";
    $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));	
	
	
		
		
		
  		$sql1 = "INSERT INTO payment_details1 (order_no,order_date, amount_paid ,email_address, customer_name, payment_type, name_on_card, card_number, expiration_date ,expiration_date1)
             			VALUES ('$orderid','$today','$totalamount','$email_address','$complete_name','$payment_type','$full_name','$card_number','$exp_month','$exp_date')";
		$insertpayment = mysqli_query($connect, $sql1) or die(mysqli_error($connect)); 
  			
		}
			if($j == 1){
				?><script>alert('Thanks for your Order! Your Order Was Stored Successfully! ');</script>
				
				<?php
			echo "Thanks for your Order!";
		echo "Please, remember your Order number is $orderid<br>";
		
		echo "<h3>Return Parameters-Order values:</h3>";
        		echo "<pre>";
				echo "Your name is : $complete_name<br>";
				echo "Your owner name is : $full_name<br>";
				echo "Your Email Address is : $email_address<br>";
				echo "Your payment type  is : $payment_type<br>";
				echo "Your card nymber is : $card_number<br>";
				echo "Expired date  is : $exp_date<br>";
        		echo "</pre>";
			
		echo "<h3> Products of delivery and total cash paid </h3>";
			}
		if($j>=1){
			echo "Product chosen # $j" ;
		echo "<pre>";
			
		echo "<div id ='total_value'>";
		
		$total_per_product = $cart_price*$cart_quantity;
		echo "Product item name chosen : $cart_item_name<br>";
		echo "Product quantity : $cart_quantity<br>";
	    echo "Product price per item chosen : $cart_price"?>&euro;<?php "<br>";
		echo "<br> Your order total money cashed per product : $total_per_product " ?>&euro;<?php "<br>";
        echo "</div>";
		echo "</pre>";
			}
			
			
			if($j == $count){
				echo "<pre>";
			echo "Your order total money cashed : $totalamount" ?>&euro;<?php "<br>";
		echo "</pre>";
			}
		$query = "DELETE FROM cart1 WHERE cart_sess='$sessid'";
		$delete = mysqli_query($connect, $query) or die(mysql_error()); 
	
		}
			
				
			}
    	
		
		}
		?>
		 <p class="balik-home1"><a href="index.php" >Back to Home Page!</a></p><br/><?php
		

			}
			
















			
				
		   
		
		?>
			







</div>
</div>
</body>
</html>