<?php
include "conn.php";
session_start();
if (!isset($_SESSION['user'])) {
  $_SESSION['msg'] = "You have to log in first";
  header('location: login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: login.php");
}
$user = $_SESSION['user'];
$qurey="SELECT  * FROM admin WHERE username='$user'";
        $result=mysqli_query($conn,$qurey);
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $id=$row['id'];
          $autho=$row['autho'];
        }
?>
<html lang="en">

<head>
  
  <link rel="stylesheet" href="style1.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AVS ENTERPRISES</title>
</head>

<body>
<div class="navbarsticky">
  <ul class="navbar">
    <li><h1>AVS ENTERPRISES</h1></li>
    <div class="navitems">
    <li><h4><div class="nav1" >User:  <?php echo $user; ?></div></h4></li>
    <li><h4><div class="nav2" >Authority:  <?php echo $autho;  ?></div></h4></li>
    </div>
  </ul>
  <button class="btn-logout"><a href="logout.php">Logout</a></button>
  <span>
  </div>
    <div class="dashbord">
    <div class="dash-text">
    Amount Sold
    <?php
      $totsold=0;
      $qurey1="SELECT * FROM sales_bill";
      $result1=mysqli_query($conn,$qurey1);
      while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
        $totsold=$totsold+$row['net_amt'];
      }
    ?>
    <h2>&#x20b9;<?php echo $totsold;?></h2>
    </div>
    </div>
  </span>
  <span>
    <div class="dashbord">
      <div class="dash-text">
      Total Amount Outstanding
      <?php
      $totsold=0;
      $qurey1="SELECT * FROM customer_balance_details";
      $result1=mysqli_query($conn,$qurey1);
      while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
        $totsold=$totsold+$row['balance'];
      }
    ?>
    <h2>&#x20b9;<?php echo $totsold;?></h2>
      </div>
    </div>
  </span>
  <span>
    <div class="dashbord">
      <div class="dash-text">
        Total Amount Outstanding for Companies: 
          <?php
      $totsold=0;
      $qurey1="SELECT * FROM buyer_compnay_reg";
      $result1=mysqli_query($conn,$qurey1);
      while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
        $totsold=$totsold+$row['balance'];
      }
    ?>
    <h2>&#x20b9;<?php echo $totsold;?></h2>
      </div>
    </div>
  </span>
    <ul class="menu-list">
      <li><a href="customer_register.php" id="black-text">Add Customer</a><hr></li>
      <li><a href="buyer_register.php" id="black-text">Add Buyer Company</a><hr></li>
      <li><a href="additem.php" id="black-text">Add Item</a><hr></li>
      <li><a href="./addsalesbill.php" id="black-text">Add Sales Bill</a><hr></li>
      <li><a href="#" id="black-text">Add Purchase Bill</a><hr></li>
      <li><a href="#" id="black-text">Add Users</a><hr></li>
      <li><a href="coustomer_details.php" id="black-text"> Customer Details</a><hr></li>
      <li><a href="itemdetails.php" id="black-text">View Item Details</a><hr></li>
      <li><a href="#" id="black-text">Reports</a><hr></li>
      <li><a href="pricelist.php" id="black-text">Price List</a><hr></li>
      <li><a href="update.php" id="black-text">update</a></li>
    </ul>
</body>

</html>