<?php

include ('updatecart.php');

?>

<HTML>
<HEAD> 
  <link rel="stylesheet" type="text/css" href="Aliberti.css"/>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    
	
	

</HEAD>
<BODY> 
<div id="wrapper_search">

<div id="main_content">


<?php

$connect = mysqli_connect("localhost", "root", "", "users_orders") or die("Please, check your server connection.");
$tosearch=$_POST['tosearch'];
$query = "select * from products1 where ";
$query_fields = Array();
$sql = "SHOW COLUMNS FROM products1";
$columnlist = mysqli_query($connect, $sql) or die(mysql_error()); 
while($arr = mysqli_fetch_array($columnlist, MYSQLI_ASSOC)){
	extract($arr);
 	$query_fields[] = $Field . " like('%". $tosearch . "%')";
}
$query .= implode(" OR ", $query_fields);
$results = mysqli_query($connect, $query) or die(mysqli_error($connect)); 

echo "<table style=\"margin-left:100px;\"  border=\"0\">";
$x=1;
echo "<tr>";
$row = mysqli_num_rows( $results );
$count = $row;
echo "<h3> Results about your search keyword  <b> '".$tosearch. "'</b> </h3>" ;

while ($count >0)  {
	if ($x <= 4)
	{
		$x = $x + 1;

$row1 = mysqli_fetch_row( $results );
extract($row1);

$imagename = $row1[6];
$item_name = $row1[1];
$price = $row1[5];
$item_code = $row1[0];

$count = $count-1;
   		echo "<td style=\"padding-right:105px;padding-top:80px;\">";
		echo "<a href=details.php?itemcode=$item_code>";
		echo '<img src=' . $imagename . ' style="max-width:220px;max-height:350px;width:auto;height:auto;"></img><br/>';
 		echo $item_name .'<br/>';
		echo "</a>";
    		echo $price  ?>&euro;<?php '<br>';
			
			
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

</BODY>
</HTML>


