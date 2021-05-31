<?php
// Categories
function catergoryUpdateActiveQ( $active, $cid, $db){
	$updateCategoryActiveQ = "UPDATE categories 
							  SET active = '$active'
							  WHERE cid ='$cid'";

	if (!mysqli_query($db, $updateCategoryActiveQ)) 
	{
		echo "Error updating record: " . mysqli_error($db);
		mysqli_close($db);
	}	
}

function catergoryDeleteQ($cid, $db){
	$deleteCategoryQ = "DELETE FROM categories 							
						WHERE cid ='$cid'";

	if (!mysqli_query($db, $deleteCategoryQ)) 
	{
		echo "Error updating record: " . mysqli_error($db);
		mysqli_close($db);
	}
}

// Products
function productUpdateActiveQ( $active, $pid, $db){
	$updateProductActiveQ = "UPDATE products 
							 SET product_active = '$active'
							 WHERE pid ='$pid'";

	if (!mysqli_query($db, $updateProductActiveQ)) 
	{
		echo "Error updating record: " . mysqli_error($db);
		mysqli_close($db);
	}	
}

function productDeleteQ( $pid, $db){
	$deleteProductQ = "DELETE FROM products 							
					   WHERE pid ='$pid'";

	if (!mysqli_query($db, $deleteProductQ)) 
	{
		echo "Error updating record: " . mysqli_error($db);
		mysqli_close($db);
	}	
}
?>