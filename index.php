<?php 
// Starting session
session_start();

//Databse
include ("inc/conn.php");

// Payment Gateway
include ('stripe/config.php');

// Get JSON file and decode contents into PHP arrays/values
$jsonFile = 'json/15062021_products.json';
$jsonData = json_decode(file_get_contents( $jsonFile ), true );

$jsonCatFile = 'json/15062021-categories.json';
$jsonCatData = json_decode(file_get_contents( $jsonCatFile ), true );
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="HandheldFriendly" content="True">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="MobileOptimized" content="320">

<title>Online Ordering</title>

<link rel="stylesheet" href="css/all.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" href="css/bootstrap.min.css">

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script defer src="js/all.js"></script> <!--load all styles -->

</head>

<body>
<div class="modal fade" id="ModalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"> &times;</button>
        <h4>Login</h4>
      </div>
      <div class="modal-body">
        <form class="form-inline" id="loginForm" action="inc/logger.php" method="POST">
          <div class="form-group">
            <label class="sr-only" for="email">Email</label>
            <input type="text" class="form-control input-sm" placeholder="Email" id="usernameLogin" name="usernameLogin">
          </div>
          <div class="form-group">
            <label class="sr-only" for="password">Password</label>
            <input type="password" class="form-control input-sm" placeholder="Password" id="PasswordLogin" name="PasswordLogin">
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox">
              Remember me </label>
          </div>
          <button type="submit" class="btn btn-info btn-xs" name="submitLogin" id="submitLogin">Sign in</button>
          <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- REGISTER MODAL -->
<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body mx-3">
      <form action="inc/logger.php" id="sigupForm"method="POST">
        <div class="md-form mb-5"> <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="usernameSignup"  name="usernameSignup" class="form-control validate">
          <label data-error="wrong" data-success="right" for="usernameSignup">Username</label>
        </div>
        <div class="md-form mb-5"> <i class="fas fa-envelope prefix grey-text"></i>
          <input type="phone" id="mobileSignup" name="mobileSignup" class="form-control validate">
          <label data-error="wrong" data-success="right" for="mobileSignup">Your Mobile</label>
        </div>
        <div class="md-form mb-5"> <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="emailSignup" name="emailSignup" class="form-control validate">
          <label data-error="wrong" data-success="right" for="emailSignup">Your email</label>
        </div>
        <div class="md-form mb-4"> <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="passwordSignup" name="passwordSignup" class="form-control validate">
          <label data-error="wrong" data-success="right" for="passwordSignup">Your password</label>
        </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button class="btn btn-deep-orange" name="submitSignup" id="submitSignup">Sign up</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--Modal: Contact Us Form-->
<div class="modal fade" id="modalcontactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Write to us</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body mx-3">
      <form action="inc/logger.php" id="contactForm" method="POST">
        <div class="md-form mb-5"> <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="contactName" name="contactName"class="form-control validate">
          <label data-error="wrong" data-success="right" for="contactName">Your name</label>
        </div>
        <div class="md-form mb-5"> <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="contactEmail" name="contactEmail" class="form-control validate">
          <label data-error="wrong" data-success="right" for="contactEmail">Your email</label>
        </div>
        <div class="md-form mb-5"> <i class="fas fa-tag prefix grey-text"></i>
          <input type="text" id="contactSubject" name=""class="form-control validate">
          <label data-error="wrong" data-success="right" for="contactSubject">Subject</label>
        </div>
        <div class="md-form"> <i class="fas fa-pencil prefix grey-text"></i>
          <textarea type="text" id="contactMessage" name="contactMessage" class="md-textarea form-control" rows="4"></textarea>
          <label data-error="wrong" data-success="right" for="contactMessage">Your message</label>
        </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button class="btn btn-unique" name="contactus" id="contactus">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
include('inc/menu.php');
?>
<!-- hero -->
<header class="hero">
  <div class="banner">
    <h2 class="banner-title">Hi
      <?php 
	if(isset($_SESSION['username']))
	{ 
		echo $_SESSION['username'];
	} 
	?>
      <br/>
      Please place your order </h2>
    <?php
if (isset($_GET['success'])){
	?>
    <div class="row">
      <div class="col">
        <div class="alert alert-success alert-dismissable fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" onClick="header(shop.php)"> <span aria-hidden="true">&times;</span> </button>
          <h2 class="alert-heading">Your payment was successful!</h2>
          <h2>Thankyou and Enjoy.</h2>
        </div>
      </div>
    </div>
    <?php	
}
if (isset($_GET['fail'])){
	?>
    <div class="row">
      <div class="col">
        <div class="alert alert-danger alert-dismissable fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert"> <span aria-hidden="true">&times;</span> </button>
          <h2 class="alert-heading">Payment failed to process!</h2>
          <h2>Please contact us to organise alternative payment.</h2>
        </div>
      </div>
    </div>
    <?php
}

// get each category and its products
  $catArr = [];
  $pidArr = array(); // helps keep the correct as it will fill over the iteration of catArr          
  $cidPointer = '';  
  $cid = 0;  
  $pid = 0;
  $id = 0;
  $title = "";
  $product_description = "";
  $price = 0.00;
  $size = "";
  $spice = "";
  $startrow = 1;  // set hard to make sure we start at the first row (offset = 1)
  $product_image = "";
  $rowFlag = 0; // if flag=1 then add a div at the bottom as well and reset to flag = 0

  foreach( $jsonCatData as $cat )
  //echo print_r($cat);
  {
    $catArr[$cat['cid']] =  [
      'cid' => $cat['cid'],
      'category_name' => $cat['category_name'],
      'anchor' => $cat['anchor'],
      'row' => $cat['row'],  
      'active' => $cat['active'],                            
    ];
  }
  
  //echo print_r($catArr);

  // now we can iterate over this array an set up each button recursively
  echo '<div class="menuRow">';
  //echo print_r($arr);
  // foreach CID (used as the pointer for the array) in catArr

  foreach( $catArr as $arr )
  { 
    // set the row
    $thisrow = $arr['row'];
    // establish the cid
    $cidPointer = $arr['cid'];
    // echo print_r($arr);
    // exit();
    //echo $startrow . '/' . $thisrow;

    if( $thisrow > $startrow )
    {
      //echo '<br>New Row' . $thisrow . '/' . $startrow;
      echo '<div class="menuRow">
              <hr>
            </div>
            <div class="menuRow">';
      $startrow++;
      $rowFlag = 1;
    }

    //needle the stack 
    echo '<button 
              class="banner-btn"         	
              data-toggle="collapse" 
              data-target="' . $arr['anchor'] . '">' . $arr['category_name'] . '
          </button>';
    
    //remove # from 
    $id_tag = substr( $arr['anchor'], 1 );

    echo '<div id="' . $id_tag . '" class="collapse">';
      echo '<section class="products">
            <div class="section-title">
              <h2>' . strtoupper( $arr['category_name'] ) . '</h2>
            </div>
            <div class="products-center"> 
              <!-- single product -->';
      // we now need to correlate the data from the categories array with the 
      // catalouge held by JSON and feed to the front end.
      // so we know in each loop we are doing of $arr that we will wull the cid 
      // along with the rest of the data.
      // Lets use that to needle the jsondata stack and pull each product where 
      // there is a match on cid;

      // Iterate through JSON and build INSERT statements

    // Iterate through JSON and build INSERT statements
    // gets array filled with json data

    // iterates over the items array which has length = 1

    ## Return array jsonDatarows of 1 ITEMS array that holds the catalouge
    foreach ( $jsonData as $jsonCatalougeKey => $jsonCatalougeValue ) {  
      // echo $jsonDataItems . ' => ' . $jsonDatarows . '<br>';
      // echo print_r( $jsonCatalougeKey );
      // echo print_r( $jsonCatalougeValue ) . '<br>';

      // seeks needle in stack array, start = 0       
      foreach ( $jsonCatalougeValue as $jsonDataRowItems => $jsonDataRowItem ) {  
      // echo $jsonDataItems . ' => ' . $jsonDatarows . '<br>';
      // echo print_r( $jsonDataRowItems );
      // echo print_r( $jsonDataRowItem ) . '<br>';

        // gets sys node variablles
      foreach ( $jsonDataRowItem as $jsonDataRowItemKey => $jsonDataRowItemValue ){  
        // we need to access directly the array sub array 'sys' and get pid.value
        // start writing the product div
        // we need to establish all the variables first

        // echo $jsonDataItems . ' => ' . $jsonDatarows . '<br>';     
        // echo print_r( $jsonDataRowItemKey );
        // echo print_r( $jsonDataRowItemValue ) . '<br>';

        // gets id field of this.sysnode    

        foreach ( $jsonDataRowItemValue as $key => $value ){
        // $key . ' => ' . $value . '<br>';     
        // echo print_r( $key );
        // echo print_r( $value );

          if( $key == "cid" ){
            $cid = $value;              
          }
          if( $key == "pid" ){
            $pid = $value;              
          }
          if( $key == "id" ){
            $id = $value;              
          } 
          if( $key == "title" ){
            $title = $value;                
          }
          if( $key == "price" ){
            $price = $value;                
          }
          if( $key == "product_description" ){
            $product_description = $value;                 
          }
          if( $key == "size" ){
            $size = $value;                  
          }
          if( $key == "spice" ){
            $spice = $value;                   
          }
          if( $key == "suspend" ){
            $suspend = $value;
          }
          if ( $key == "image" ){
            foreach ( $value as $fieldsKey=>$fieldsVal ){
              // echo $fieldsKey . ' => ' . $fieldsVal . '<br>';

              foreach ( $fieldsVal as $fileKey=>$fileVal ){
                // echo $fileKey . ' => ' . $fileVal . '<br>';

                foreach ( $fileVal as $urlKey=>$urlVal ){
                  // echo $urlKey . ' => ' . $urlVal . '<br>';
                  //$array[addslashes($urlKey)] = addslashes($urlVal);                             
                  $product_image = $urlVal;
                } 
              }                 
            }      
          }          
        }       
        
      }

      if( !in_array( $pid, $pidArr ) 
        && $cid == $cidPointer 
        && $suspend = "Active"){ 
      
        echo '<article class="product">
                <div class="img-container">';
        echo '<img src="' . $product_image . '"
                alt="' . $title . '"
                title="' . $title . '"
                class="product-img"
                width="25px" 
                height="25px"
              />';

        if( $size == 0 && $spice == 0 ){
          echo '<button class="bag-btn" data-id="' . $pid . '"> <i class="fas fa-shopping-cart"></i>Add to Cart</button>';
        }

        if( $size == 1 ){
          echo '<button class="small-btn" data-id="' . $pid . 'small"> <i class="fas fa-shopping-cart"></i>Small</button>';
          echo '<button class="large-btn" data-id="' . $pid . 'large"> <i class="fas fa-shopping-cart"></i>Large</button>';
        }

        if( $spice == 1 ){
          echo '<button class="mild-btn" data-id="' . $pid . 'mild"> <i class="fas fa-thermometer-empty"></i>Mild</button>
              <button class="medium-btn" data-id="' . $pid . 'medium"> <i class="fas fa-thermometer-half"></i>Medium</button>
              <button class="hot-btn" data-id="' . $pid . 'hot"> <i class="fas fa-thermometer-full"></i>Hot</button>';
        }

        echo '</div>';
        echo '<h4>' . $title . '</h3>';
        echo '<h3>$' . $price . '</h4>';
        echo '</article>';
        
        if (!in_array( $pid, $pidArr )){
          array_push( $pidArr, $pid );
        }
      }
    }    
  }
  // flush product from the array
  $array = [];
    echo '<!-- end of single product -->';
    if ( $rowFlag = 1 ){
      echo '</div>';
      $rowFlag = 0;
    }
    echo '</section>';
    echo '</div>';
  }
    ?>        
    </div>
  </div>
</header>
<!-- End hero --> 
<!-- cart -->
<div class="cart-overlay">
  <div class="cart"> 
    <span class="close-cart">
      <i class="far fa-window-close"></i>
    </span>
    <h2>Order Details</h2>
    <div class="cart-content">
      <?php	
        // set the vars	
        $id = '1';
        //$price ='500';
        $price = "<script>document.write(localStorage.getItem('totalPrice'));</script>";
        $title = 'Indian Brasserie';
        echo'
          <form action="stripe/stripeIPN.php?id="'. $id .'" method="POST">
                <script
                  src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                  data-key = "' . $stripeDetails['publishableKey'] . '";
                  data-amount = "' . $price . '";
                  data-name = "'. $title . '";
                  data-description = "Indian Brasserie Online Order"
                  data-image = "https://stripe.com/img/documentation/checkout/marketplace.png"
                  data-locale = "auto">
                </script>
              </form>
          ';
      ?>
    </div>
    <div class="cart-footer">
      <h3>
        <input type="text" id="promo" name="promo" placeholder="Promotion Code" value="">
      </h3>
      <h3>your total : $<span class="cart-total" id="cart-total" name="cart-total">0</span></h3>
      <button class="clear-cart banner-btn">clear cart</button>
      <br/>
    </div>
  </div>
</div>
<!-- end of cart --> 
<!--  javascript --> 
<script src="js/app.js"></script>
</body>
</html>
