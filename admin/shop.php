<?php include ("inc/header.php");
// update shop details
if(isset($_POST['update_shop']))
{
	if(isset($_POST['shopName'])){
		$shopName = $_POST['shopName'];
	} else {
		$shopName = "Empty";
	}
	if(isset($_POST['shopAddress'])){
		$shopAddress = $_POST['shopAddress'];
	} else {
		$shopAddress = "Empty";
	}
	if(isset($_POST['shopPhone'])){
		$shopPhone = $_POST['shopPhone'];
	} else {
		$shopPhone = "Empty";
	}
	if(isset($_POST['shopMobile'])){
		$shopMobile = $_POST['shopMobile'];
	} else {
		$shopMobile = "Empty";
	}
	$updateShopNameQ = "UPDATE shop 
						SET shopName = '$shopName',
						shopAddress = '$shopAddress',
						shopPhone = '$shopPhone',
						shopMobile = '$shopMobile'
						WHERE sid ='1'";
	if (mysqli_query($db, $updateShopNameQ)) {
    	echo "Record updated successfully";
	} else {
		echo "Error updating record: " . mysqli_error($db);
	}
}
?>
<!-- navbar -->
<?php include('menu.php');?>
<!-- end of navbar -->
<?php 
$shopDetailsQ = "SELECT * FROM shop";
$shopDetailsR = mysqli_query($db, $shopDetailsQ);
// load vars
while ($shop = $shopDetailsR->fetch_assoc())
{
	$shopName = $shop['shopName'];
	$shopAddress = $shop['shopAddress'];
	$shopPhone = $shop['shopPhone'];
	$shopMobile=  $shop['shopMobile'];
}
?>
<form action="#" method="POST">
<label>Shope Name</label>
    <input type="text" name="shopName" id="shopName" value="<?php echo $shopName; ?>">
    <br/>
<label>Shope Address</label>
    <input type="text" name="shopAddress" id="shopAddress" value="<?php echo $shopAddress; ?>">
    <br/>
<label>Shope Phone</label>
    <input type="text" name="shopPhone" id="shopPhone" value="<?php echo $shopPhone; ?>">
    <br/>
<label>Shope Mobile</label>
    <input type="text" name="shopMobile" id="shopMobile" value="<?php echo $shopMobile; ?>">
    <br/>
    <input type="submit" id="update_shop" name="update_shop" value="Update Shop">
</form>
</body>
</html>