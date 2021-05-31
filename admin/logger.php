<?php
include ('inc/conn.php');
include('inc/func.php');

// check to make sure that data is passed is true
if(isset($_POST['submitCategory']))
{
	$category_name = $_POST['categoryName'];
	$category_description = $_POST['categoryDescription'];
	$categoryOrder = $_POST['CategoryOrder'];
	$categoryActive = $_POST['categoryActive']; 
	
	$categoryInsertQ = "INSERT INTO categories (cid, category_name, category_description, categoryOrder, active) VALUES ('', '$category_name', '$category_description', '$categoryOrder', '$categoryActive')";
	
	if (mysqli_query($db, $categoryInsertQ)) 
	{		
		// redirect is successfull
		header("location: categories.php");
		
	}
	else
	{
		echo "<br/>Error: " . $categoryInsertQ . "<br>" . mysqli_error($db);
	}
	
}  
else 
{
	echo 'no data to update category.';
}

if(isset($_POST['submitProduct']))
{
	$productName = $_POST['productName'];
	$productImage = 'nil';
	$productDescription = $_POST['productDescription'];
	$productPriceTA = $_POST['productPriceTA']; 
	$productPriceDI = $_POST['productPriceDI']; 
	$cid = $_POST['productCategory'];
	$productActive = $_POST['productActive']; 
	
	$productInsertQ = "INSERT INTO products (pid, product_name, product_image, product_description, product_price_ta, product_price_di, product_active, cid) 
					VALUES ('', '$productName', 'productImage', '$productDescription', '$productPriceTA', '$productPriceDI', '$productActive', '$cid')";
	
	if (mysqli_query($db, $productInsertQ)) 
	{		
		// redirect is successfull
		header("location: products.php");
		
	}
	else
	{
		echo "<br/>Error: " . $productInsertQ . "<br>" . mysqli_error($db);
	}
	
}  
else 
{
	echo 'no data to update product.';
}