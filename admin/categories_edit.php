<?php
include ('inc/header.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Category</title>
<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<?php
if(isset($_POST['submit']))
{
	$cid = $_POST['cid'];
	
	if(isset($_POST['category_name']))
	{
		$category_name = $_POST['category_name'];
	} else {
		$category_name = "Empty";
	}
	
	if(isset($_POST['category_description']))
	{
		$category_description = $_POST['category_description'];
	} else {
		$category_description = "Empty";
	}
	
	if(isset($_POST['categoryOrder']))
	{
		$categoryOrder = $_POST['categoryOrder'];
	} else {		
	$categoryOrder = "Empty";
	}
	
	$updateCategoryQ = "UPDATE categories
						SET category_name = '$category_name',
						category_description = '$category_description',
						categoryOrder = '$categoryOrder'
						WHERE cid ='$cid'";

	if (mysqli_query($db, $updateCategoryQ))
	{ 
	?>
		<script type="application/javascript">
		window.setTimeout(function() {
			redirectURL = "http://localhost/ibMaster/shop/admin/categories.php";
			time = 500;
			$(".alert").fadeTo(time, 0).slideUp(time, function(){
				$(this).remove(); 
				window.location.replace(redirectURL);
			});				
		}, 1000);
							
		</script>
        <div class="alert alert-success alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" onClick="header(http://localhost/ibMaster/shop/admin/categories.php)"> 
                <span aria-hidden="true">&times;</span></button>
                <h1 class="alert-heading"><strong>Category Updated Successfully!</strong></h1>
        </div>
<?php } else { ?>
		<script type="application/javascript">
		window.setTimeout(function() {
			redirectURL = "http://localhost/ibMaster/shop/admin/categories.php";
			time = 2000;
			$(".alert").fadeTo(time, 0).slideUp(time, function(){
				$(this).remove(); 
				window.location.replace(redirectURL);
			});				
		}, 4000);
							
		</script>
        <div class="alert alert-danger alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" onClick="header(http://localhost/ibMaster/shop/admin/categories.php)"> 
                <span aria-hidden="true">&times;</span></button>
                <h1 class="alert-heading"><strong>Failure to update Category</strong></h1>
        </div>
        <?php
		mysqli_close($db);
	}
}

if( isset($_GET['cid']) ){
	$cid = $_GET['cid'];
	
	// get the data to edit
	$categoryQ = "SELECT * FROM categories WHERE cid='$cid'";
	$categoryR = mysqli_query($db, $categoryQ); 
	
	if ( $cat = mysqli_fetch_assoc($categoryR)){	
	?>
	<h1>Categories</h1>
	<form action="categories_edit.php" method="post">
	  <div>
		<label for="category_name">Name:</label>
		<input type="text" id="category_name" name="category_name" value="<?php echo $cat['category_name']; ?>">
	  </div>
	  <div>
		<label for="category_description">Description:</label>
		<textarea id="category_description" name="category_description" cols="60" rows="20">
			<?php echo $cat['category_description']; ?>
		</textarea>
	  </div>
	  <div>
		<label for="categoryOrder">Order:</label>
		<input type="text" id="categoryOrder" name="categoryOrder" value="<?php echo $cat['categoryOrder']; ?>">
	  </div>
	  <div>
		<button type="submit" name="submit" id="submit">Update Category</button>
	  </div>
	  <input type="hidden" id="cid" name="cid" value="<?php echo $cat['cid']; ?>">
	</form>
	<?php
	} else {
	?>
	<script type="application/javascript">
		window.setTimeout(function() {
			redirectURL = "http://localhost/ibMaster/shop/admin/categories.php";
			time = 2000;
			$(".alert").fadeTo(time, 0).slideUp(time, function(){
				$(this).remove(); 
				window.location.replace(redirectURL);
			});				
		}, 4000);
							
	</script>
        <div class="alert alert-warning alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" onClick="header(http://localhost/ibMaster/shop/admin/categories.php)"> 
                <span aria-hidden="true">&times;</span></button>
                <h1 class="alert-heading"><strong>There is no category to display</strong></h1>
        </div>
<?php
}
}
?>
</body>
</html>
</body>
</html>