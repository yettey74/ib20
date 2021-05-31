<?php 
include ('stripe/config.php');
include ("../inc/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="HandheldFriendly" content="True">
	<meta name="apple-touch-fullscreen" content="yes"/>
	<meta name="MobileOptimized" content="320">
<title>Online Ordering</title>
<link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
    />
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<!-- navbar -->
<nav class="navbar" style="background-color:#f09d51">
  <div class="navbar-center"><img src="../img/logo.png" alt="Indian Brasserie" width="50px" height="50px" />INDIAN BRASSERIE
    <div class="cart-btn"> <span class="nav-icon"> <i class="fas fa-cart-plus"></i> </span>
      <div class="cart-items">0</div>
    </div>
  </div>
</nav>
<!-- end of navbar --> 
<!-- hero -->
<header class="hero">
    <div class="banner">
        <div class="row">
            <div class="col">
            	<div class="alert alert-success alert-dismissable fade show" role="alert">
            		<button type="button" class="close" data-dismiss="alert" onClick="header(shop.php)"> <span aria-hidden="true">&times;</span> </button>
            		<h2 class="alert-heading">Your payment was successful!</h2>
                    <h2>Thankyou and Enjoy.</h2>
            	</div>
            </div>		
        </div>
    </div>
</header>
<!-- End hero -->
<script src="app.js"></script>
</body>
</html>
