<?php 
include ("inc/header.php");
include ("menu.php");

$customerDetailsQ = "SELECT * FROM customer";
$customerDetailsR = mysqli_query($db, $customerDetailsQ);
?>
<div class="table-responsive-sm">          
  <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Mobile</th>
      </tr>
    </thead>
    <tbody>
	<?php
    while ($customer = $customerDetailsR->fetch_assoc()){
		echo'<tr>';
		echo'<td>' . $customer['fname'] . '</td>';
		echo'<td>' . $customer['lname'] . '</td>';
		echo'<td>' . $customer['email'] . '</td>';
		echo'<td>' . $customer['mobile'] . '</td>';
		echo'</tr>';
    }
    ?>
    </tbody>
  </table>
  </div>
</body>
</html>