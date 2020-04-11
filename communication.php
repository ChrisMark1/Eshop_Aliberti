<?php
include('updatecart.php');

?>
<html>
  <head>
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="Aliberti.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="normalize.min.css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
 <style type="text/css">

.demo-table {
	background: #d9eeff;
	width: 100%;
	border-spacing: initial;
	margin: 110px 0px;
	word-break: break-word;
	table-layout: auto;
	line-height: 1.8em;
	color: #333;
	border-radius: 4px;
	padding: 20px 40px;
}


.demo-table td {
	padding: 10px 0px;
	margin-left: 30px;
}
.demoInputBox {
	padding: 5px 20px ;
	border: #a9a9a9 1px solid;
	border-radius: 4px;
}
.btnLogin {
	padding: 10px 30px;
	background-color: #3367b2;
	border: 0;
	color: #FFF;
	cursor: pointer;
	border-radius: 4px;
	margin-left: 10px;
}
</style>
 
 
  </head>
  
  
  
  <?php



$connect = mysqli_connect("localhost", "root", "", "customers") or die ("Please, check the server connection.");


// REGISTER USER
if (isset($_POST['button'])) {
  // receive all input values from the form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

 $sql = "INSERT INTO comm_form (name, email, phone, message) VALUES ('$name','$email','$phone','$message')";
   $result = mysqli_query($connect, $sql) or die(mysql_error());
   
   ?><script>alert('Thank You!Your Values Incerted Successfully!');</script><?php
}
?>
  <body>
<div id="wrapper_comm1">
<h3 align="center">Communication!</h3>
<div id="main_content">

<section id="contact">
  <div class="container">
    <div class="well well-sm">
      <h3><strong>Contact Us</strong></h3>
    </div>
	
	<div class="row">
	  <div class="col-md-7">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100711.39301250642!2d23.806158187524797!3d37.925032844694265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a190d92d6f221b%3A0xcf87399696b19aa6!2zzpHOm86ZzpzOoM6VzqHOpM6XIM6RzpLOlc6V!5e0!3m2!1sel!2sgr!4v1526072743996" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>      </div>

      <div class="col-md-5">
          <h4><strong>Get in Touch</strong></h4>
        <form method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="name" required pattern="[A-Za-z]{1-20}" title="Use Only Characters!" value="" placeholder="Name">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" required value="" placeholder="E-mail">
          </div>
          <div class="form-group">
            <input type="tel" class="form-control" name="phone" required pattern="[0-9]{10}" title="Use Only 10 Digits!" value="" placeholder="Phone">
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="3" placeholder="Message"></textarea>
          </div>
          <button class="btn btn-default" type="submit" name="button">
              <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit
          </button>
        </form>
      </div>
    </div>
  </div>
</section>








</div>
</div>
</body>
</html>
      
 