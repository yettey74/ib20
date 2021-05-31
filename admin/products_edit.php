<?php
include ('inc/header.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Products</title>
<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<?php
if(isset($_POST['submit']))
{
	$pid = $_POST['pid'];
	
	if(isset($_POST['product_name']))
	{
		$product_name = $_POST['product_name'];
	} else {
		$product_name = "Empty";
	}
	
	if(isset($_POST['product_image']))
	{
		$product_image = $_POST['product_image'];
	} else {
		$product_image = "Empty";
	}
	
	if(isset($_POST['product_description']))
	{
		$product_description = $_POST['product_description'];
	} else {
		$product_description = "Empty";
	}
	
	if(isset($_POST['product_price_ta']))
	{
		$product_price_ta = $_POST['product_price_ta'];
	} else {
		$product_price_ta = "0";
	}
	
	if(isset($_POST['product_price_di']))
	{
		$product_price_di = $_POST['product_price_di'];
	} else {
		$product_price_di = "0";
	}	
	
	if(isset($_POST['productCategory']))
	{
		$cid = $_POST['productCategory'];
	} else {	
		$cid = '0';
	}
	$timestamp = date("Y-m-d H:i:s");
	
	$updateProductQ = "UPDATE products
					   SET product_name = '$product_name',
						   product_image = '$product_image',
						   product_description = '$product_description',
						   product_price_ta = '$product_price_ta',
						   product_price_di = '$product_price_di',
						   updated_on = NOW(),
						   cid = '$cid'										
					   WHERE pid ='$pid'";
					   					
	if (mysqli_query($db, $updateProductQ))
	{ 
	?>
<script type="application/javascript">
		window.setTimeout(function() {
			redirectURL = "http://localhost/ibMaster/shop/admin/products.php";
			time = 500;
			$(".alert").fadeTo(time, 0).slideUp(time, function(){
				$(this).remove(); 
				window.location.replace(redirectURL);
			});				
		}, 1000);
							
		</script>
<div class="alert alert-success alert-dismissable" role="alert">
  <button type="button" class="close" data-dismiss="alert" onClick="header(http://localhost/ibMaster/shop/admin/categories.php)"> <span aria-hidden="true">&times;</span></button>
  <h1 class="alert-heading"><strong>Product Updated Successfully!</strong></h1>
</div>
<?php } else { ?>
<script type="application/javascript">
		window.setTimeout(function() {
			redirectURL = "http://localhost/ibMaster/shop/admin/products.php";
			time = 2000;
			$(".alert").fadeTo(time, 0).slideUp(time, function(){
				$(this).remove(); 
				window.location.replace(redirectURL);
			});				
		}, 4000);
							
		</script>
<div class="alert alert-danger alert-dismissable" role="alert">
  <button type="button" class="close" data-dismiss="alert" onClick="header(http://localhost/ibMaster/shop/admin/products.php)"> <span aria-hidden="true">&times;</span></button>
  <h1 class="alert-heading"><strong>Failure to update Product</strong></h1>
</div>
<?php
		mysqli_close($db);
	}
}

if( isset($_GET['pid']) ){
	$pid = $_GET['pid'];
	
	// get the data to edit
	$productQ = "SELECT * FROM products p, categories c WHERE p.cid = c.cid && pid='$pid'";
	$productR = mysqli_query($db, $productQ); 
	
	if ( $product = mysqli_fetch_assoc($productR)){	
	?>
<h1>Products</h1>
<form action="products_edit.php" method="post">
<div class="md-form mb-5"> <i class="fas fa-pencil prefix grey-text"></i>
    <label for="product_name">ID:</label>
    <input type="text" id="pid" name="pid" value="<?php echo $product['pid']; ?>" disabled>
  </div>
  <div class="md-form mb-5"> <i class="fas fa-pencil prefix grey-text"></i>
    <label for="product_name">Name:</label>
    <input type="text" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>">
  </div>
  <div class="md-form mb-5"> <i class="fas fa-pencil prefix grey-text"></i>
    <label for="product_price_ta">Image:</label>
    <input type="text" id="product_image" name="product_image" value="<?php echo $product['product_image']; ?>">
  </div>
  <div class="md-form mb-5"> <i class="fas fa-pencil prefix grey-text"></i>
    <label for="product_description">Description:</label>
    <textarea id="product_description" name="product_description" cols="60" rows="20">
			<?php echo $product['product_description']; ?>
		</textarea>
  </div>
  <div class="md-form mb-5"> <i class="fas fa-pencil prefix grey-text"></i>
    <label for="product_price_ta">TakeAway Price:</label>
    <input type="text" id="product_price_ta" name="product_price_ta" value="<?php echo $product['product_price_ta']; ?>">
  </div>
  <div class="md-form mb-5"> <i class="fas fa-pencil prefix grey-text"></i>
    <label for="product_price_di">Dine In Price:</label>
    <input type="text" id="product_price_di" name="product_price_di" value="<?php echo $product['product_price_di']; ?>">
  </div>
  <div class="md-form mb-5"> <i class="fas fa-seedling prefix grey-text"></i>
    <label data-error="wrong" data-success="right" for="productCategory">Category</label>
    <select class="browser-default custom-select" id="productCategory" name="productCategory">
      <option value="<?php $product['cid']; ?>" selected><?php echo $product['category_name']; ?></option>
      <?php
        $categoriesQ = "SELECT * FROM categories";
        $categoriesR = mysqli_query($db, $categoriesQ);
        while($category = $categoriesR->fetch_assoc()){
            echo '<option value="' . $category['cid'] .'">' . $category['category_name'] .'</option>';
        }
    ?>
    </select>
  </div>
  <div>
    <button type="submit" name="submitProduct" id="submitProduct">Update Product</button>
  </div>
  <input type="hidden" id="pid" name="pid" value="<?php echo $product['pid']; ?>">
</form>
<?php
} else {
?>
<script type="application/javascript">
	window.setTimeout(function() {
		redirectURL = "http://localhost/ibMaster/shop/admin/products.php";
		time = 2000;
		$(".alert").fadeTo(time, 0).slideUp(time, function(){
			$(this).remove(); 
			window.location.replace(redirectURL);
		});				
	}, 4000);
						
</script>
<div class="alert alert-warning alert-dismissable" role="alert">
  <button type="button" class="close" data-dismiss="alert" onClick="header(http://localhost/ibMaster/shop/admin/products.php)"> <span aria-hidden="true">&times;</span></button>
  <h1 class="alert-heading"><strong>There is no product to display</strong></h1>
</div>
<?php
}
}
?>
</body>
</html>
</body>
</html>