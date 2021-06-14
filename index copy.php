<?php 
// Starting session
session_start();

include ('stripe/config.php');
include ("inc/conn.php");
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

?>
    <div class="menuRow">
      <button 
          class="banner-btn"         	
          data-toggle="collapse" 
          data-target="#fullmenu">Full Menu</button>
      <?php
          // get all entrees
          /* $vegEntreeQ = "SELECT * FROM products WHERE cid='1'";
          $vegEntreeR = mysqli_query($db, $vegEntreeQ); */
          ?>
      <div id="fullmenu" class="collapse">
        <section class="products">
          <div class="section-title">
          </div>
          <div class="products-center"> 
            <!-- single product -->            
                  <article class="product">
                    <div class="img-container"> 
                    <img src=""
                         alt="alt"
                         title="title"
                         class="product-img"
                         width="25px" 
                         height="25px"
                      />
                      <button class="bag-btn" data-id=""></button>
                    </div>
                    <h4></h3>
                    <h3></h4>
                  </article>
            <!-- end of single product --> 
          </div>
        </section>
      </div>
    </div>

    <div class="menuRow">
      <button 
          class="banner-btn"         	
          data-toggle="collapse" 
          data-target="#vegentree">Vegetarian Entree</button>
      <?php
          // get all entrees
          $vegEntreeQ = "SELECT * FROM products WHERE cid='1'";
          $vegEntreeR = mysqli_query($db, $vegEntreeQ);
          ?>
      <div id="vegentree" class="collapse">
        <section class="products">
          <div class="section-title">
            <h2>VEGETARIAN ENTREES</h2>
          </div>
          <div class="products-center"> 
            <!-- single product -->
            <?php
                while ( $vegEntree = $vegEntreeR->fetch_assoc() )
                {
                  $size = $vegEntree['size'];
                  $spice = $vegEntree['spice'];
                ?>
                  <article class="product">
                    <div class="img-container"> 
                    <img src="/ib20/img/order/<?php echo $vegEntree['product_image'] ?>"
                         alt="<?php echo $vegEntree['title'] ?>"
                         title="<?php echo $vegEntree['title'] ?>"
                         class="product-img"
                         width="25px" 
                         height="25px"
                      />
                      <?php
                        if( $size == 0 && $spice == 0 ){
                      ?>
                          <button class="bag-btn" data-id="<?php echo $vegEntree['id']; ?>"> <i class="fas fa-shopping-cart"></i><?php echo $spice; ?> Large </button>
                     <?php
                        }
                      ?>
                      <?php
                        if( $vegEntree['size'] == 1 ){
                      ?>
                          <button class="small-btn" data-id="<?php echo $vegEntree['id']; ?>small"> <i class="fas fa-shopping-cart"></i> Large </button>
                          <button class="large-btn" data-id="<?php echo $vegEntree['id']; ?>large"> <i class="fas fa-shopping-cart"></i> Small</button>
                     <?php
                        }
                      ?>
                      <?php
                      if( $vegEntree['spice'] == 1 ){
                      ?>
                          <button class="mild-btn" data-id="<?php echo $vegEntree['id']; ?>mild"> <i class="fas fa-thermometer-empty"></i> Mild </button>
                          <button class="medium-btn" data-id="<?php echo $vegEntree['id']; ?>medium"> <i class="fas fa-thermometer-half"></i> Medium</button>
                          <button class="hot-btn" data-id="<?php echo $vegEntree['id']; ?>hot"> <i class="fas fa-thermometer-full"></i> Hot</button>
                      <?php
                        }
                      ?>
                    </div>
                    <h4><?php echo $vegEntree['title'] ?></h3>
                    <h3>$<?php echo $vegEntree['price'] ?></h4>
                  </article>
            <?php
                } 
                ?>
            <!-- end of single product --> 
          </div>
        </section>
      </div>
      <button 
        class="banner-btn"         	
        data-toggle="collapse" 
        data-target="#nventree">Non Vegetarian Entree 
      </button>
      <?php
  // get all entrees
  $nvEntreeQ = "SELECT * FROM products WHERE cid='2'";
  $nvEntreeR = mysqli_query($db, $nvEntreeQ);
  ?>
      <div id="nventree" class="collapse">
        <section class="products">
          <div class="section-title">
            <h2>NON VEGETARIAN ENTREES</h2>
          </div>
          <div class="products-center"> 
            <!-- single product -->
            <?php
		while ( $nvEntree = $nvEntreeR->fetch_assoc() )
		{
		?>
            <article class="product">
              <div class="img-container"> 
              <img src="/ib20/img/order/<?php echo $nvEntree['product_image'] ?>"
                  alt="<?php echo $nvEntree['title'] ?>"
                  class="product-img"
                  width="25px" 
                  height="25px" />
                <button class="bag-btn" data-id="<?php echo $nvEntree['id'] ?>"> <i class="fas fa-shopping-cart"></i> Add to Order </button>
              </div>
              <h3><?php echo $nvEntree['title'] ?></h3>
              <h4>$<?php echo $nvEntree['price'] ?></h4>
            </article>
            <?php
		} 
		?>
            <!-- end of single product --> 
          </div>
        </section>
      </div>
    </div>
    <div class="menuRow">
      <hr>
    </div>
    <div class="menuRow">
      <button 
                class="banner-btn"         	
                data-toggle="collapse" 
                data-target="#accom">Accompaniments </button>
      <?php
			  // get all entrees
			  $accomQ = "SELECT * FROM products WHERE cid='11'";
			  $accomR = mysqli_query($db, $accomQ);
			  ?>
      <div id="accom" class="collapse">
        <section class="products">
          <div class="section-title">
            <h2>ACCOMPANIMENTS</h2>
          </div>
          <div class="products-center"> 
            <!-- single product -->
            <?php
					while ( $accom = $accomR->fetch_assoc() )
					{
					?>
            <article class="product">
              <div class="img-container"> 
              <img src="/ib20/img/order/<?php echo $accom['product_image'] ?>"
                  alt="<?php echo $accom['title'] ?>"
                  class="product-img"
                  width="25px" 
                  height="25px" />
                <button class="bag-btn" data-id="<?php echo $accom['id']?>"> <i class="fas fa-shopping-cart"></i> Add to Order </button>
              </div>
              <h3><?php echo $accom['title'] ?></h3>
              <h4>$<?php echo $accom['price'] ?></h4>
            </article>
            <?php
					} 
					?>
            <!-- end of single product --> 
          </div>
        </section>
      </div>
      <button 
                class="banner-btn"         	
                data-toggle="collapse" 
                data-target="#salad">Salads </button>
      <?php
			  // get all entrees
			  $saladQ = "SELECT * FROM products WHERE cid='10'";
			  $saladR = mysqli_query($db, $saladQ);
			  ?>
      <div id="salad" class="collapse">
        <section class="products">
          <div class="section-title">
            <h2>SALADS</h2>
          </div>
          <div class="products-center"> 
            <!-- single product -->
            <?php
					while ( $salad = $saladR->fetch_assoc() )
					{
					?>
            <article class="product">
              <div class="img-container"> 
              <img src="/ib20/img/order/<?php echo $salad['product_image'] ?> "
                    alt="<?php echo $salad['title'] ?>"
                    class="product-img"
                    width="25px" 
                    height="25px"/>
                <button class="bag-btn" data-id="<?php echo $salad['id'] ?>"> <i class="fas fa-shopping-cart"></i> Add to Order </button>
              </div>
              <h3><?php echo $salad['title'] ?></h3>
              <h4>$<?php echo $salad['price'] ?></h4>
            </article>
            <?php
					} 
					?>
            <!-- end of single product --> 
          </div>
        </section>
      </div>
      <button 
                class="banner-btn"         	
                data-toggle="collapse" 
                data-target="#bread">Breads </button>
      <?php
			  // get all entrees
			  $breadQ = "SELECT * FROM products WHERE cid='8'";
			  $breadR = mysqli_query($db, $breadQ);
			  ?>
      <div id="bread" class="collapse">
        <section class="products">
          <div class="section-title">
            <h2>BREADS</h2>
          </div>
          <div class="products-center"> 
            <!-- single product -->
            <?php
					while ( $bread = $breadR->fetch_assoc() )
					{
					?>
            <article class="product">
              <div class="img-container"> 
              <img src="/ib20/img/order/<?php echo $bread['product_image'] ?> "
						  alt="<?php echo $bread['title'] ?>"
						  class="product-img"
						  width="25px" 
						  height="25px"/>
                <button class="bag-btn" data-id="<?php echo $bread['id'] ?>"> <i class="fas fa-shopping-cart"></i> Add to Order </button>
              </div>
              <h3><?php echo $bread['title'] ?></h3>
              <h4>$<?php echo $bread['price'] ?></h4>
            </article>
            <?php
					} 
					?>
            <!-- end of single product --> 
          </div>
        </section>
      </div>
      <button 
                class="banner-btn"         	
                data-toggle="collapse" 
                data-target="#rice">Rice </button>
      <?php
			  // get all entrees
			  $riceQ = "SELECT * FROM products WHERE cid='9'";
			  $riceR = mysqli_query($db, $riceQ);
			  ?>
      <div id="rice" class="collapse">
        <section class="products">
          <div class="section-title">
            <h2>RICE</h2>
          </div>
          <div class="products-center"> 
            <!-- single product -->
            <?php
					while ( $rice = $riceR->fetch_assoc() )
					{
					?>
            <article class="product">
              <div class="img-container"> <img src="/ib20/img/order/<?php echo $rice['product_image'] ?> "
						  alt="<?php echo $rice['title'] ?>"
						  class="product-img"
						  width="25px" 
						  height="25px"/>
                <button class="bag-btn" data-id="<?php echo $rice['id'] ?>"> <i class="fas fa-shopping-cart"></i> Add to Order </button>
              </div>
              <h3><?php echo $rice['title'] ?></h3>
              <h4>$<?php echo $rice['price'] ?></h4>
            </article>
            <?php
					} 
					?>
            <!-- end of single product --> 
          </div>
        </section>
      </div>
    </div>
    <div class="menuRow">
      <hr>
    </div>
    <div class="menuRow">
      <button 
                    class="banner-btn"         	
                    data-toggle="collapse" 
                    data-target="#kids">Kids Dishes </button>
      <?php
			  // get all entrees
			  $kidsQ = "SELECT * FROM products WHERE cid='13'";
			  $kidsR = mysqli_query($db, $kidsQ);
			  ?>
      <div id="kids" class="collapse">
        <section class="products">
          <div class="section-title">
            <h2>KIDS DISHES</h2>
          </div>
          <div class="products-center"> 
            <!-- single product -->
            <?php
					while ( $kids = $kidsR->fetch_assoc() )
					{
					?>
            <article class="product">
              <div class="img-container"> <img src="/ib20/img/order/<?php echo $kids['product_image'] ?> "
						  alt="<?php echo $kids['title'] ?>"
						  class="product-img"
						  width="25px" 
						  height="25px"/>
                <button class="mild-btn" data-id="<?php echo $kids['id'] ?>"> <i class="fas fa-shopping-cart"></i> Mild </button>
                <button class="medium-btn" data-id="<?php echo $kids['id'] ?>"> <i class="fas fa-shopping-cart"></i> Medium </button>
                <button class="hot-btn" data-id="<?php echo $kids['id'] ?>"> <i class="fas fa-shopping-cart"></i> Hot </button>
              </div>
              <h3><?php echo $kids['title'] ?></h3>
              <h4>$<?php echo $kids['price'] ?></h4>
            </article>
            <?php
					} 
					?>
            <!-- end of single product --> 
          </div>
        </section>
      </div>
      <button 
                class="banner-btn" 
                data-toggle="collapse" 
                data-target="#veg">Vegetable Dishes</button>
      <?php
			  // get all entrees
			  $vegQ = "SELECT * FROM products WHERE cid='10'";
			  $vegR = mysqli_query($db, $vegQ);
			  ?>
      <div id="veg" class="collapse">
        <section class="products">
          <div class="section-title">
            <h2>VEGETABLE DISHES</h2>
          </div>
          <div class="products-center"> 
            <!-- single product -->
            <?php
					while ( $veg = $vegR->fetch_assoc() )
					{
					?>
            <article class="product">
              <div class="img-container"> 
                <img src="/ib20/img/order/<?php echo $veg['product_image'] ?> "
                     alt="<?php echo $veg['title'] ?>"
                     class="product-img"
                     width="25px" 
                     height="25px"/>

                <button class="mild-btn" data-id="<?php echo $veg['id'] ?>"> <i class="fas fa-thermometer-empty"></i> Mild </button>

                <button class="medium-btn" data-id="<?php echo $veg['id'] ?>"> <i class="fas fa-thermometer-half"></i> Medium </button>

                <button class="hot-btn" data-id="<?php echo $veg['id'] ?>"> <i class="fas fa-thermometer-full"></i> Hot </button>

              </div>
              <h3><?php echo $veg['title'] ?></h3>
              <h4>$<?php echo $veg['price'] ?></h4>
            </article>
            <?php
					} 
					?>
            <!-- end of single product --> 
          </div>
        </section>
      </div>
      <button 
                class="banner-btn" 
                data-toggle="collapse" 
                data-target="#chicken">Chicken Dishes </button>
      <?php
			  // get all chicken dishes
			  $chickenQ = "SELECT * FROM products WHERE cid='4'";
			  $chickenR = mysqli_query($db, $chickenQ);
			  ?>
      <div id="chicken" class="collapse">
        <section class="products">
          <div class="section-title">
            <h2>CHICKEN DISHES</h2>
          </div>
          <div class="products-center"> 
            <!-- single product -->
            <?php
					while ( $chicken = $chickenR->fetch_assoc() )
					{
					?>
            <article class="product">
              <div class="img-container"> 
                <img src="img/order/<?php echo $chicken['product_image'] ?>"
                     alt="<?php echo $chicken['title'] ?>"
                     class="product-img"
                     width="25px" 
                     height="25px"/>
                <button class="mild-btn" data-id="<?php echo $chicken['id']?>"> <i class="fas fa-shopping-cart"></i> Mild </button>
                <button class="medium-btn" data-id="<?php echo $chicken['id'] ?>"> <i class="fas fa-shopping-cart"></i> Medium </button>
                <button class="hot-btn" data-id="<?php echo $chicken['id'] ?>"> <i class="fas fa-shopping-cart"></i> Hot </button>
              </div>
              <h3><?php echo $chicken['title'] ?></h3>
              <h4>$<?php echo $chicken['price'] ?></h4>
            </article>
            <?php
					}
					?>
            <!-- end of single product --> 
          </div>
        </section>
      </div>
      <button 
                class="banner-btn" 
                data-toggle="collapse" 
                data-target="#beef">Beef Dishes </button>
      <?php
			  // get all beef dishes
			  $beefQ = "SELECT * FROM products WHERE cid='6'";
			  $beefR = mysqli_query($db, $beefQ);
			  ?>
      <div id="beef" class="collapse">
        <section class="products">
          <div class="section-title">
            <h2>BEEF DISHES</h2>
          </div>
          <div class="products-center"> 
            <!-- single product -->
            <?php
					while ( $beef = $beefR->fetch_assoc() )
					{
					?>
            <article class="product">
              <div class="img-container"> <img src="/ib20/img/order/<?php echo $beef['product_image'] ?> "
						  alt="<?php echo $beef['title'] ?>"
						  class="product-img"
						  width="25px" 
						  height="25px"/>
                <button class="bag-btn" data-id="<?php echo $beef['id']?>"> <i class="fas fa-shopping-cart"></i> Mild </button>
                <button class="medium-btn" data-id="<?php echo $beef['id'] ?>"> <i class="fas fa-shopping-cart"></i> Medium </button>
                <button class="hot-btn" data-id="<?php echo $beef['id'] ?>"> <i class="fas fa-shopping-cart"></i> Hot </button>
              </div>
              <h3><?php echo $beef['title'] ?></h3>
              <h4>$<?php echo $beef['price'] ?></h4>
            </article>
            <?php
					}
					?>
            <!-- end of single product --> 
          </div>
        </section>
      </div>
    </div>
    <div class="menuRow">
      <hr>
    </div>
    <div class="menuRow">
      <button 
                class="banner-btn" 
                data-toggle="collapse" 
                data-target="#lamb">Lamb Dishes </button>
      <?php
			  // get all lamb dishes
			  $lambQ = "SELECT * FROM products WHERE cid='5'";
			  $lambR = mysqli_query($db, $lambQ);
			  ?>
      <div id="lamb" class="collapse">
        <section class="products">
          <div class="section-title">
            <h2>LAMB DISHES</h2>
          </div>
          <div class="products-center"> 
            <!-- single product -->
            <?php
					while ( $lamb = $lambR->fetch_assoc() )
					{
					?>
            <article class="product">
              <div class="img-container"> <img src="/ib20/img/order/<?php echo $lamb['product_image'] ?> "
						  alt="<?php echo $lamb['title'] ?>"
						  class="product-img"
						  width="25px" 
						  height="25px"/>
                <button class="mild-btn" data-id="<?php echo $lamb['id']?>"> <i class="fas fa-shopping-cart"></i> Mild </button>
                <button class="medium-btn" data-id="<?php echo $lamb['id'] ?>"> <i class="fas fa-shopping-cart"></i> Medium </button>
                <button class="hot-btn" data-id="<?php echo $lamb['id'] ?>"> <i class="fas fa-shopping-cart"></i> Hot </button>
              </div>
              <h3><?php echo $lamb['title'] ?></h3>
              <h4>$<?php echo $lamb['price'] ?></h4>
            </article>
            <?php
					}
					?>
            <!-- end of single product --> 
          </div>
        </section>
      </div>
      <button 
                class="banner-btn"         	
                data-toggle="collapse" 
                data-target="#goat">Goat Dishes </button>
      <?php
  // get all goat dishes
  $goatQ = "SELECT * FROM products WHERE cid='16'";
  $goatR = mysqli_query($db, $goatQ);
  ?>
      <div id="goat" class="collapse">
        <section class="products">
          <div class="section-title">
            <h2>GOAT DISHES</h2>
          </div>
          <div class="products-center"> 
            <!-- single product -->
            <?php
		while ( $goat = $goatR->fetch_assoc() )
		{
		?>
            <article class="product">
              <div class="img-container"> <img src="/ib20/img/order/<?php echo $goat['product_image'] ?> "
              alt="<?php echo $goat['title'] ?>"
              class="product-img"
              width="25px" 
              height="25px"/>
                <button class="mild-btn" data-id="<?php echo $goat['id']?>"> <i class="fas fa-shopping-cart"></i> Mild </button>
                <button class="medium-btn" data-id="<?php echo $goat['id'] ?>"> <i class="fas fa-shopping-cart"></i> Medium </button>
                <button class="hot-btn" data-id="<?php echo $goat['id'] ?>"> <i class="fas fa-shopping-cart"></i> Hot </button>
              </div>
              <h3><?php echo $goat['title'] ?></h3>
              <h4>$<?php echo $goat['price'] ?></h4>
            </article>
            <?php
		}
		?>
            <!-- end of single product --> 
          </div>
        </section>
      </div>
      <button 
                class="banner-btn"         	
                data-toggle="collapse" 
                data-target="#seafood">Seafood Dishes </button>
      <?php
  // get all seafood
  $seafoodQ = "SELECT * FROM products WHERE cid='3'";
  $seafoodR = mysqli_query($db, $seafoodQ);    
  ?>
      <div id="seafood" class="collapse">
        <section class="products">
          <div class="section-title">
            <h2>SEAFOOD DISHES</h2>
          </div>
          <div class="products-center"> 
            <!-- single product -->
            <?php
		while ( $seafood = $seafoodR->fetch_assoc() )
		{
		?>
            <article class="product">
              <div class="img-container"> <img src="/ib20/img/order/<?php echo $seafood['product_image'] ?> "
              alt="<?php echo $seafood['title'] ?>"
              class="product-img"
              width="25px" 
              height="25px"/>
                <button class="mild-btn" data-id="<?php echo $seafood['id']?>"> <i class="fas fa-shopping-cart"></i> Mild </button>
                <button class="medium-btn" data-id="<?php echo $seafood['id'] ?>"> <i class="fas fa-shopping-cart"></i> Medium </button>
                <button class="hot-btn" data-id="<?php echo $seafood['id'] ?>"> <i class="fas fa-shopping-cart"></i> Hot </button>
              </div>
              <h3><?php echo $seafood['title'] ?></h3>
              <h4>$<?php echo $seafood['price'] ?></h4>
            </article>
            <?php
		}
		?>
            <!-- end of single product --> 
          </div>
        </section>
      </div>
    </div>
    <div class="menuRow">
      <hr>
    </div>
    <div class="menuRow">
      <button 
                class="banner-btn"         	
                data-toggle="collapse" 
                data-target="#dessert">Desserts </button>
      <?php
  // get all seafood
  $dessertQ = "SELECT * FROM products WHERE cid='12'";
  $dessertR = mysqli_query($db, $dessertQ);    
  ?>
      <div id="dessert" class="collapse">
        <section class="products">
          <div class="section-title">
            <h2>DESSERTS</h2>
          </div>
          <div class="products-center"> 
            <!-- single product -->
            <?php
            while ( $dessert = $dessertR->fetch_assoc() )
            {
            ?>
            <article class="product">
              <div class="img-container"> 
              <img src="/ib20/img/order/<?php echo $dessert['product_image'] ?> "
                  alt="<?php echo $dessert['title'] ?>"
                  class="product-img"
                  width="25px" 
                  height="25px"/>
                <button class="bag-btn" data-id="<?php echo $dessert['id'] ?>"> <i class="fas fa-shopping-cart"></i> Add to Order </button>
              </div>
              <h3><?php echo $dessert['title'] ?></h3>
              <h4>$<?php echo $dessert['price'] ?></h4>
            </article>
            <?php
            }
            ?>
            <!-- end of single product --> 
          </div>
        </section>
      </div>
      <button 
        class="banner-btn"         	
        data-toggle="collapse" 
        data-target="#drinks">Refreshments </button>
      <?php
  // get all drinks
  $drinkQ = "SELECT * FROM products WHERE cid='14'";
  $drinkR = mysqli_query($db, $drinkQ);    
  ?>
      <div id="drinks" class="collapse">
        <section class="products">
          <div class="section-title">
            <h2>REFRESHMENTS</h2>
          </div>
          <div class="products-center"> 
            <!-- single product -->
            <?php
            while ( $drink = $drinkR->fetch_assoc() )
            {
            ?>
            <article class="product">
              <div class="img-container"> 
              <img src="/ib20/img/order/<?php echo $drink['product_image'] ?>"
                  alt="<?php echo $drink['title'] ?>"
                  class="product-img"
                  width="25px" 
                  height="25px"/>
                <button class="bag-btn" data-id="<?php echo $drink['id'] ?>"> <i class="fas fa-shopping-cart"></i> Add to Order </button>
              </div>
              <h3><?php echo $drink['title'] ?></h3>
              <h4>$<?php echo $drink['price'] ?></h4>
            </article>
            <?php
            }
            ?>
            <!-- end of single product --> 
          </div>
        </section>
      </div>
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
