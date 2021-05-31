<?php
	require_once "stripe-php-master/init.php";
	//require_once "products.php";

	$stripeDetails = array(
		"secretKey" => "sk_test_UTBTY2XZqoKiv3FnBcFc67dY00D4ZvpoQt",
		"publishableKey" => "pk_test_9luwZhPu4bRGvlzeOKJv7fLS00kjImM7HJ"
	);

	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here: https://dashboard.stripe.com/account/apikeys
	\Stripe\Stripe::setApiKey($stripeDetails['secretKey']);
	
	// test CC = 4242424242424242
?>
