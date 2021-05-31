<?php
include ('inc/header.php');

// Update Category
if(isset($_GET['active']))
{		
	$cid = $_GET['cid'];
	$active = $_GET['active'];
	catergoryUpdateActiveQ( $active, $cid, $db);
	header("location: categories.php");
}

// Delete category
if(isset($_GET['action']))
{		
	/*$cid = $_GET['cid'];
	$active = $_GET['active'];
	catergoryDeleteQ( $active, $cid, $db);*/
}

?>
<div class="modal fade" id="modalNewCategoryForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">New Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body mx-3">
      <form action="logger.php" id="categoryForm"method="POST">
        <div class="md-form mb-5"> <i class="fas fa-seedling prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="categoryName">Category Name</label>
          <input type="text" id="categoryName"  name="categoryName" class="form-control validate">
        </div>
        <div class="md-form mb-5"> <i class="fas fa-scroll prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="categoryDescription">Category Description</label>
          <input type="text" id="categoryDescription" name="categoryDescription" class="form-control validate">
        </div>
        <div class="md-form mb-5"> <i class="fas fa-sort prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="CategoryOrder">Category Order</label>
          <input type="text" id="categoryOrder" name="CategoryOrder" class="form-control validate">
        </div>
        
        <!-- Default inline 1-->
        <div class="custom-control custom-radio custom-control-inline">
  			<input type="radio" class="custom-control-input" id="categoryOn" name="categoryActive" value="1">
  			<label class="custom-control-label" for="categoryOn">On</label>
		</div>

        <!-- Default inline 2-->
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="categoryOff" name="categoryActive" value="0">
          <label class="custom-control-label" for="categoryOff">Off</label>
        </div>
        
      </div>
        <div class="modal-footer d-flex justify-content-center">
          <button class="btn btn-deep-orange" name="submitCategory" id="submitCategory">Add Category</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- navbar -->
<?php include('menu.php');?>
<!-- end of navbar -->

<h1>Categories</h1>
<div class="row">
    <div class="col">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNewCategoryForm">Add Category</button>
    </div>
  </div>
  <div class="table-responsive-sm">          
  <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th>Category Name</th>
        <th>Category Description</th>
        <th>Order</th>
        <th>Active</th>        
        <th>Edit</th>      
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
<?php
$categoryQ = "SELECT * FROM categories ORDER BY categoryOrder";
$categoryR = mysqli_query($db, $categoryQ);
$u = "u";
while ( $cat = $categoryR->fetch_assoc() )
{
	$categoryID = $cat['cid'];
	echo'<tr class="categories">';
	echo'<td>' . $cat['category_name'] . '</td></a>';
	echo'<td>' . $cat['category_description'] . '</td>';
	echo'<td>' . $cat['categoryOrder'] . '</td>';
	if ( $cat['active'] == '1' ){
		echo'<td><a href="categories.php?cid='. $categoryID . '&active=0"> <img src="img/btn-on.png" alt="ON" width="50px" height="50px"></a></td>';
	} else {
		echo'<td><a href="categories.php?cid='. $categoryID . '&active=1"> <img src="img/btn-off.png" alt="ON" width="50px" height="50px"></a></td>';
	}
	echo'<td><a href="categories_edit.php?cid='. $categoryID . '"><img src="img/edit.png" alt="EDIT" width="50px" height="50px"></a></td>';
	echo'<td><a href="categories.php?cid='. $categoryID . '&action=d"> <img src="img/delete.png" alt="DELETE" width="50px" height="50px"></a></td>';
	echo'</tr>';
}
?>
    </tbody>
  </table>
  </div>
</body>
</html>