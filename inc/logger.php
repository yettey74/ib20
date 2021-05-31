<?php
// Starting session
session_start();

include ('conn.php');
include('func.php');

// check to make sure that data is passed is true
if(isset($_POST['submitSignup']))
{
	$usernameSignup = $_POST['usernameSignup'];
	$mobileSignup = $_POST['mobileSignup'];
	$emailSignup = $_POST['emailSignup'];
	$password = $_POST['passwordSignup']; 
	
	$password = salty($password);
	
	$signupQ = "INSERT INTO customer (customerID, username, fname, lname, email, mobile, password) VALUES ('', '$usernameSignup', '','', '$emailSignup', '$mobileSignup', '$password')";
	
	if (mysqli_query($db, $signupQ)) 
	{
		$customerID = mysqli_insert_id($db);
		$loginFlag = true;
		
		// login
		$_SESSION['customerID'] = $customerID;
		$_SESSION['username'] = $usernameSignup;
		
		// redirect is successfull
		header("location: ../index.php");		
	}
	else
	{
		echo "<br/>Error: " . $signupQ . "<br>" . mysqli_error($db);
	}
	
} 
else if(isset($_POST['submitLogin'])) 
{	
	$username = isset($_POST['usernameLogin'])? $_POST['usernameLogin'] : '';
	$username = cleanString($username);	
		
	$password = isset($_POST['PasswordLogin'])? $_POST['PasswordLogin'] : '';
	$password = cleanString($password);
	//$password = salty($password);
	
	//echo 'Username: ' . $username . ' and Password: ' . $password .'<br/>';
		
	$sql = "SELECT * FROM customer WHERE username = '$username' && password = '$password'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	if(mysqli_num_rows($result) == 1){
		$customerID = $row['customerID'];
		$_SESSION['customerID'] = $customerID;
		$_SESSION['customerUsername'] = $row['username'];
		
		
		if ($customerID > 0){
		    header("location: ../index.php"); // Redirecting To CMS Page
		} else {
		    //header("location: badlogin.php"); // Redirecting To Other Page
		}
	} else {
	   echo 'fail';
	    //header("location: fail.php"); // Redirecting To Other Page
	}	
} 
else 
{
	echo 'no data to login.';
}


if(isset($_POST['contactus']))
{
	$usernameSignup = $_POST['usernameSignup'];
	$mobileSignup = $_POST['mobileSignup'];
	$emailSignup = $_POST['emailSignup'];
	$passwordSignup = $_POST['passwordSignup']; 
	
	$signupQ = "INSERT INTO customer (customerID, username, fname, lname, email, mobile, password) VALUES ('', '$usernameSignup', '','', '$emailSignup', '$mobileSignup', '$passwordSignup')";
	
	if (mysqli_query($db, $signupQ)) 
	{
		// redirect is successfull
		
	}
	else
	{
		echo "<br/>Error: " . $signupQ . "<br>" . mysqli_error($db);
	}
	
} 
?>