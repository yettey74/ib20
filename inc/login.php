<?php
// Starting session
session_start();

include ('conn.php');
include('func.php');
	
	$username=$_POST['usernameLogin'];
	$password=$_POST['PasswordLogin'];
	
//	echo $username . ' ' . $password .'<br/>';
	
	// To protect from MySQL injection
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysqli_real_escape_string($db, $username);
	$password = mysqli_real_escape_string($db, $password);			
	$password = salty($password);
	
	$sql = "SELECT * FROM customer WHERE username = '$username' && hashedPassword = '$password'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	if(mysqli_num_rows($result) == 1){
		$customerID = $_SESSION['customerID'] = $row['customerID']; // Initializing Session
		$customerName = $_SESSION['customerName'] = $row['username'];
		
		if ($customerID = 1){
		    header("location: ../index.php?s"); // Redirecting To CMS Page
		} else {
		    header("location: ../index.php?f"); // Redirecting To Other Page
		}
	} else {
	   // echo 'fail';
	    header("location: fail.php"); // Redirecting To Other Page
	}	
?>