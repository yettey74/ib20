<?php
	require_once "config.php";
	
	\Stripe\Stripe::setVerifySslCerts(false);

	// Token is created using Checkout or Elements!
	// Get the payment token ID submitted by the form:
	$productID = $_GET['id'];

	if ( !isset( $_POST['stripeToken'] )) {
		header("Location: ../error.php");
		exit();
	}

	$token = $_POST['stripeToken'];
	$email = $_POST["stripeEmail"];
	
	$amount = "<script>document.write(localStorage.getItem('totalPrice'));</script>";
	// Charge the user's card:
	$charge = \Stripe\Charge::create(array(
		"amount" => $amount,
		"currency" => "aud",
		"description" => 'order',
		"source" => $token,
	));

	//send an email
	
	//store information to the database
	
	//redirect to success page
	header("Location: ../shop.php?success");
	
	
	//echo 'Success! You have been charged $5';
?>