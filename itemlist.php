<?php
include('updatecart.php');
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Aliberti.css"/>

</head>
<body>
<div id="wrapper_itemlist">
<h3 align="center"> Please choose your favourite product!</h3>
<div id="main_content">


<?php

$connect = mysqli_connect("localhost", "root", "", "users_orders") or die("Please, check your server connection.");
$category=$_REQUEST['category'];
$query = "SELECT item_code, item_name, description, imagename, price FROM products1 WHERE category like '$category' order by item_code";
$imagename = "SELECT imagename FROM products1 WHERE category like '$category' order by item_code";
$results = mysqli_query($connect, $query) or die(mysqli_error($connect)); 
echo "<table style=\"margin-left:250px;\" border=\"0\">";
$x=1;
echo "<tr>";

$row = mysqli_num_rows( $results );
$count = $row;
while ($count >0)  {
	if ($x <= 4)
	{
		$x = $x + 1;

$row1 = mysqli_fetch_row( $results );


$imagename = $row1[3];
$item_name = $row1[1];
$price = $row1[4];
$item_code = $row1[0];


$count = $count-1;
   		echo "<td style=\"padding-right:85px;padding-top:80px;\">";
		echo "<a href=details.php?itemcode=$item_code>";
		echo '<img src=' . $imagename . ' style="max-width:220px;max-height:350px;width:auto;height:auto;"></img><br/>';
 		echo $item_name .'<br/>';
		echo "</a>";
    		echo $price  ?>&euro;<?php '<br>';
			if ($item_name === "Hra" ){
			$category1 = $category .'hracol';
				echo "<a href=color.php?category=$category1>";
			echo '<br>'."Choose color!".'<br>';
			
			}
			if ($item_name === "Hfaistos" ){
			$category2 = $category .'hfcol';
				echo "<a href=color.php?category=$category2>";
			echo '<br>'."Choose color!".'<br/>';
    		
			}
			if ($item_name === "Afrodity" ){
			$category7 = $category .'afrcol';
				echo "<a href=color.php?category=$category7>";
			echo '<br>'."Choose color!".'<br/>';

			}
			if ($item_name === "Hfaistosone" ){
			$category3 = $category .'hfonecol';
				echo "<a href=color.php?category=$category3>";
			echo '<br>'."Choose color!".'<br/>';
    
			}
			if ($item_name === "Poseidwnas" ){
			$category4 = $category .'poscol';
				echo "<a href=color.php?category=$category4>";
			echo '<br>'."Choose color!".'<br/>';
    		
			}
			
			echo "</td>";
	}
	else
	{
		$x=1;
		echo "</tr><tr>";
	}
}
echo "</table>";
?>
</div>
</div>
</body>
</html>