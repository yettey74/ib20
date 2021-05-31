<?php
session_start();
#load db
include ('conn.php');

if(isset($_SESSION['CustomerID'])){	
	$CustomerID = $_SESSION['CustomerID'];
	$username = $_SESSION['username'];
} else {
	$CustomerID = '';
	$username = '';
}

// keywords num count
$keywordQ = "SELECT * FROM keywords";
$keywordR = mysqli_query($db, $keywordQ);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="Indian Brassiere Golden Grove's finest Indian restaurant.">
<meta name="keywords" content="Indian Brassiere restaurant,golden grove,indian,Restaurant near me,Best Indian Restaurant,Indian Cuisine,Indian Takeaway,Indian Delivery,Indian Curry,Indian Restaurant Adelaide,Indian Restaurant Golden Grove,Indian takeaway Salisbury,Gluten Free Restaurant,Halal Indian Restaurant,Indian Restaurant Greenwith,Meal Deals,Veg Entree,Non Veg Entree,Seafood,Chicken Dishes,Lamb Dishes,Beef Dishes,Goat Curry,Vegetable Dishes,Choice of Bread,Basmati Rice,Delivery to Banksia Park,Brahma Lodge,Elizabeth East,Elizabeth Vale">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
<!--Fontawesome CDN-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!--Custom styles-->
<link rel="stylesheet" href="css/main.css">

<script type="text/javascript" src="myscripts.js"></script>

<?php 

// get shop details
$shopDetailsQ = "SELECT * FROM shop";
$shopDetailsR = mysqli_query($db, $shopDetailsQ);
$shop = mysqli_fetch_array($shopDetailsR,MYSQLI_ASSOC);
$_SESSION['shopName'] = $shop['shopName'];
$_SESSION['shopAddress'] = $shop['shopAddress'];
$_SESSION['shopPhone'] = $shop['shopPhone'];
$_SESSION['shopMobile'] = $shop['shopMobile'];
?>