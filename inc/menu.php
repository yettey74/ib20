
<!-- Navbar -->
<nav class="navbar" style="background-color:#f09d51">
  <div class="navbar-center"><img src="../ib20/img/logo.png" alt="Indian Brasserie" width="50px" height="50px" />
  <ul class="nav navbar-nav navbar-right">
      <li style="font-size: 1rem;"><a data-toggle="modal" data-target="#modalcontactForm"><span class="fas fa-envelope fa-fw"></span> Contact</a></li>
    </ul>
    <div class="space">&nbsp;</div>
    <ul class="nav navbar-nav navbar-right">
    <?php
	if(!isset($_SESSION['username']))
	{
	?>
      <li style="font-size: 1rem;"><a data-toggle="modal" data-target="#ModalLoginForm"><span class="fas fa-sign-in-alt fa-fw"></span> Login</a></li>
      <?php
	} else {
		?>
		<li style="font-size: 1rem;"><a href="inc/logout.php"><span class="fas fa-sign-in-alt fa-fw"></span> Logout</a></li>
        <?php
	}
	?>
    </ul>
    <div class="space">&nbsp;</div>
    <ul class="nav navbar-nav navbar-right">
    <?php
	if(!isset($_SESSION['username']))
	{
	?>
      <li style="font-size: 1rem;"><a data-toggle="modal" data-target="#modalRegisterForm"><span class="fas fa-pencil-alt fa-fw"></span> Register</a></li>
     <?php } ?>
    </ul>
    
    <div class="space">&nbsp;</div>
    <div class="cart-btn"> <span class="nav-icon"> <i class="fas fa-cart-plus fa-fw"></i> </span>
      <div class="cart-items">0</div>
    </div>
  </div>
</nav>
<!-- end of Navbar --> 