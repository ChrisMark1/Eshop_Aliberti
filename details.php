<?php
include('updatecart.php');
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Aliberti.css"/>

</head>
<body>
<div id="wrapper_details">
<h3 align="center"> Please choose Quantity of your favourite product!</h3>
<div id="main_content">




<?php
$connect = mysqli_connect("localhost", "root", "", "users_orders") or die("Please, check your server connection.");
$code=$_REQUEST['itemcode'];
$query = "SELECT item_code, item_name, description, category ,quantity, imagename, price FROM products1 " .
         	"where item_code like '$code'";
$results = mysqli_query($connect, $query) or die(mysqli_error($connect));
$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
extract($row);
echo "<table style=\"background-color:grey;\"width=\"100%\" height=\"400px;\" cellspacing=\"0\" cellpadding=\"5\">";
echo "<tr><td style=\"padding: 3px;\" rowspan=\"6\">";
echo '<img src=' . $imagename . ' style="max-width:200px;margin-top:30px;max-height:260px;width:auto;height:auto;"></img></td>';
echo "<td colspan=\"2\" align=\"center\" style=\"font-family:verdana;font-size:150%;position:absolute;top:80px;left:540px;\"><b>";
echo $item_name;
echo "</b></td></tr><tr> <td colspan=\"2\"><table><tr><td style=\"position:absolute;top:150px;left:300px;\">";
$itemname=urlencode($item_name);
$itemprice=$price;
$itemdescription=$description;

echo "</td><td style=\"position:absolute;top:120px;left:540px;\">";
echo "<b>Item Code : $code</b>";
echo "</td></tr><tr><td style=\"position:absolute;top:150px;left:540px;\">";
echo "<b>Catery Item : $category</b>";
echo "</td><td>";
echo "<tr><td style=\"position:absolute;top:180px;left:540px;\">";
echo "<b>Warehouse Quantity : $quantity</b>";
echo "</td><td>";
echo "</td></tr><tr><td>";
echo "<form method=\"POST\" action=\"addtocart.php?action=add&icode=$item_code&iname=$itemname&iprice=$itemprice\">";
echo "<td colspan=\"2\" style=\"font-family:verdana; position:absolute;top:250px;left:490px; font-size:150%;\">";
echo " Quantity: <input type=\"text\" name=\"quantity\" size=\"2\"> &nbsp;&nbsp;&nbsp;Price: " . $itemprice; ?>&euro;<?php
echo "</td></tr><tr>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"addtocart\" value=\"Add To Cart\" style=\"font-size:150%;margin-top:120px;position:absolute;left:760px;\"></td>";
echo"  </form>";
echo "<form method=\"POST\" action=\"itemlist.php?action=add&category=$category\">";
echo "<tr><td  colspan=\"2\"><input type=\"submit\" name=\"buynow\" value=\"Back To Products\" style=\"font-size:150%;margin-top:100px;position:absolute;left:350px;\">";
echo"  </form>";
echo "</tr></table></table>";
echo "<p  style=\"font-size:140%;\">Description</p>";
echo $itemdescription;
?>
</div>
</div>

</body>
</html>
