<?php
include ('inc/header.php');

// Update Category
if(isset($_GET['active']))
{		
	$pid = $_GET['pid'];
	$active = $_GET['active'];
	productUpdateActiveQ( $active, $pid, $db);
	header("location: products.php");
}

// Delete category
if(isset($_GET['action']))
{	
	$pid = $_GET['pid'];
	productDeleteQ( $pid, $db);
	header("location: products.php");
}
?>
<div class="modal fade" id="modalNewProductForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">New Product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body mx-3">
      <form action="logger.php" id="categoryForm"method="POST">
        <div class="md-form mb-5"> <i class="fas fa-seedling prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="productName">Product Name</label>
          <input type="text" id="productName"  name="productName" class="form-control validate">
        </div>
        <div class="md-form mb-5"> <i class="fas fa-scroll prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="productDescription">Product Description</label>
          <input type="text" id="productDescription" name="productDescription" class="form-control validate">
        </div>
        <div class="md-form mb-5"> <i class="fas fa-dollar-sign prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="productPriceTA">Takeaway Price</label>
          <input type="text" id="productPriceTA" name="productPriceTA" class="form-control validate">
        </div>
        <div class="md-form mb-5"> <i class="fas fa-dollar-sign prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="productPriceDI">Dine In Price</label>
          <input type="text" id="productPriceDI" name="productPriceDI" class="form-control validate">
        </div>
       <div class="md-form mb-5"> <i class="fas fa-seedling prefix grey-text"></i>
        <label data-error="wrong" data-success="right" for="productCategory">Category</label>
        <select class="browser-default custom-select" id="productCategory" name="productCategory">
        <option value="" disabled selected>Select a Category</option>    
        <?php
			$categoriesQ = "SELECT * FROM categories";
			$categoriesR = mysqli_query($db, $categoriesQ);
			while($cat = $categoriesR->fetch_assoc()){
				echo '<option value="' . $cat['cid'] .'">' . $cat['category_name'] .'</option>';
			}
		?>
        </select>
        </div>
        
        <!-- Default inline 1-->
        <div class="custom-control custom-radio custom-control-inline">
  			<input type="radio" class="custom-control-input" id="productOn" name="productActive" value="1">
  			<label class="custom-control-label" for="productOn">On</label>
		</div>

        <!-- Default inline 2-->
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="productOff" name="productActive" value="0">
          <label class="custom-control-label" for="productOff">Off</label>
        </div>
        
      </div>
        <div class="modal-footer d-flex justify-content-center">
          <button class="btn btn-deep-orange" name="submitProduct" id="submitProduct">Add Product</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- EDIT MODAL -->
<div class="modal fade" id="modalEditProductForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Edit Product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body mx-3">
      <form action="logger.php" id="categoryForm" method="POST">
        <div class="md-form mb-5"> <i class="fas fa-seedling prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="productName">Product Name</label>
          <input type="text" id="productName"  name="productName" class="form-control validate">
        </div>
        <div class="md-form mb-5"> <i class="fas fa-scroll prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="productDescription">Product Description</label>
          <input type="text" id="productDescription" name="productDescription" class="form-control validate">
        </div>
        <div class="md-form mb-5"> <i class="fas fa-dollar-sign prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="productPriceTA">Takeaway Price</label>
          <input type="text" id="productPriceTA" name="productPriceTA" class="form-control validate">
        </div>
        <div class="md-form mb-5"> <i class="fas fa-dollar-sign prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="productPriceDI">Dine In Price</label>
          <input type="text" id="productPriceDI" name="productPriceDI" class="form-control validate">
        </div>
       <div class="md-form mb-5"> <i class="fas fa-seedling prefix grey-text"></i>
        <label data-error="wrong" data-success="right" for="productCategory">Category</label>
        <select class="browser-default custom-select" id="productCategory" name="productCategory">
        <option value="" disabled selected>Select a Category</option>    
        <?php
			$categoriesQ = "SELECT * FROM categories";
			$categoriesR = mysqli_query($db, $categoriesQ);
			while($cat = $categoriesR->fetch_assoc()){
				echo '<option value="' . $cat['cid'] .'">' . $cat['category_name'] .'</option>';
			}
		?>
        </select>
        </div>
        
        <!-- Default inline 1-->
        <div class="custom-control custom-radio custom-control-inline">
  			<input type="radio" class="custom-control-input" id="productOn" name="productActive" value="1">
  			<label class="custom-control-label" for="productOn">On</label>
		</div>

        <!-- Default inline 2-->
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="productOff" name="productActive" value="0">
          <label class="custom-control-label" for="productOff">Off</label>
        </div>
        
      </div>
        <div class="modal-footer d-flex justify-content-center">
          <button class="btn btn-deep-orange" name="submitProduct" id="submitProduct">Add Product</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- navbar -->
<?php include('menu.php');?>
<!-- end of navbar -->

<h1>Products</h1>
<div class="row">
    <div class="col">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNewProductForm">Add Product</button>
    </div>
  </div>
  <div class="table-responsive-sm">          
  <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th>Category</th>
        <th>Product</th>
        <th>Image</th>
        <th>Description</th>
        <th>Takeaway</th>
        <th>Dine In</th>   
        <th>Active</th>        
        <th>Edit</th>      
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
<?php
$productQ = "SELECT * FROM products p, categories c
			WHERE p.cid = c.cid";
$productR = mysqli_query($db, $productQ);
while ( $product = mysqli_fetch_array($productR) )
{
	$pid = $product['pid'];
	echo'<tr class="products">';
	echo'<td>' . $product['category_name'] . '</td></a>';
	echo'<td>' . $product['product_name'] . '</td></a>';
	echo'<td>' . $product['product_image'] . '</td>';
	echo'<td>' . $product['product_description'] . '</td>';
	echo'<td>' . $product['product_price_ta'] . '</td>';
	echo'<td>' . $product['product_price_di'] . '</td>';
	if ( $product['product_active'] == '1' ){
		echo'<td><a href="products.php?pid='. $pid . '&active=0"> <img src="img/btn-on.png" alt="ON" width="50px" height="50px"></a></td>';
	} else {
		echo'<td><a href="products.php?pid='. $pid . '&active=1"> <img src="img/btn-off.png" alt="ON" width="50px" height="50px"></a></td>';
	}
	//echo '<td><button type="button" class="btn btn-primary" id="' . $pid . '" data-toggle="modal" data-target="#modalEditProductForm">Edit</button></td>';
	echo'<td><a href="products_edit.php?pid='. $pid . '"><img src="img/edit.png" alt="EDIT" width="50px" height="50px"></a></td>';
	echo'<td><a href="products.php?pid='. $pid . '&action=d"> <img src="img/delete.png" alt="DELETE" width="50px" height="50px"></a></td>';
	echo'</tr>';
}

?>
    </tbody>
  </table>
  </div>
</body>
</html>