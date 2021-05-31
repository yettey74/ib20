<?php
function salty($password){
	$salt = 'abcdefghijklmnopqrstuvwx';
	$cost = 10;
	$hash = '$2y$' . $cost . '$' . $salt;
	$password = crypt($password, $hash);
	return $password;	
}

function redirectURL($url, $statusCode = 303){
	// example of use redirect('http://example.com/',false) 
	header('location: ' . $url, true, $statusCode);
	exit();		
}

function cleanString($string){
	$string = trim($string);
  	$string = strip_tags($string);
  	$string = htmlspecialchars($string);
	return $string;
}
?>