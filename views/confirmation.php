<?php
session_start();

include "../classes/category.php";
include "../classes/cart.php";
include "../classes/order.php";

// object
$categories = new Category;
$category_list = $categories->getAllCategories();

$cart = new Cart;
// print_r($_SESSION)

$order = new Order;
$order_details = $order->getOrder($_GET["order_id"]);
// print_r($order_details);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, shrink-to-fit=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="css/confirmation.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
  <title>YUJI</title>
</head>
<body>
  <header>
    <h1>YUJI</h1>

    <nav>
      <div class="navbar">
        <div class="navbar-toggler"  data-toggle="collapse" data-target="#navbar-1" aria-expanded="false"> 
          <i class="fas fa-grip-lines"></i>
        </div>
        <div class="top-nav">
          <div class="collapse navbar-collapse dropdown-menu" id="navbar-1">
            <a href="user-page.php" class="dropdown-item">HOME</a>
            <a href="#" class="dropdown-item">ABOUT</a>
            <a href="#" class="dropdown-item">SHIPPING</a>
            <a href="#" class="dropdown-item">CONTACTS</a>
            <a href="#" class="dropdown-item">FAQ TOPICS</a>
          </div>
        </div>

        <div class="dropright">
          <div class="navbar-toggler" data-toggle="collapse" data-target="#navbar-2" aria-expanded="false"> 
            <i class="fas fa-th-large"><span> CATALOG</span></i>
          </div>
          <div class="top-nav">
            <div class="collapse navbar-collapse dropdown-menu " id="navbar-2">
              <?php
              while($cat_details = $category_list->fetch_assoc()){
              ?>
              <a href="all-products.php#<?= $cat_details["id"]?>" class="dropdown-item"><?= $cat_details["cat_name"]?></a>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
        <div class="cart">
          <a href="cart.php"><i class="fas fa-shopping-cart"><?= $cart->getTotalQty($_SESSION["user_id"])?></i></a>
        </div>
      </div>
    </nav>
    <div class="sign-in">
      <?php
      if (!empty($_SESSION)){
        
        echo "<p class='hello'>Hello, ".$_SESSION["username"]."<a href='../actions/logout.php' class='logout text-danger'>"." ". "SIGN OUT</a>"."</p>";

      }else{
        echo "<a href='sign-in.php'>SIGN  IN</a>";
        echo "<span>/</span>";
        echo "<a href='register.php'> UP</a>";
      }
      ?>
    </div>
  </header>
  <main>
    <div class="container">
      <h3>Thanks for your Shopping!</h3>
      
      <div class="userinfo">
        <div class="prod username">
          Username : <?= $_SESSION["username"]?>
        </div>
        <div class="prod fullname">
          Name : <?= $order_details["first_name"]." ".$order_details["last_name"]?>
        </div>
        <div class="prod email">
          Email : <?= $order_details["email"]?>
        </div>
      </div>
      <div class="prodinfo">
        <div class="prod ordered">
          <!-- <?php
          // while()
          ?> -->
        </div>
        <div class="prod qty">
          Quantity :<?= $order_details["total_quantity"]?>
        </div>
        <div class="prod tprice">
          Total price :<?= $order_details["total_price"]?>
        </div>
        <div class="prod date">
          This is the day you purchased :<?= $order_details["checkout_date"]?>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <div class="box-1">
      <h4>YUJI</h4>

      <div class="fnav">

        <div class="fnav-1">
          <h6>Navigation</h6>
          <ul>
            <li>
              <a href="#">HOME</a>
            </li>
            <li>
              <a href="#">ABOUT</a>
            </li>
            <li>
              <a href="#">SHIPPING</a>
            </li>
            <li>
              <a href="#">CONTACTS</a>
            </li>
            <li>
              <a href="#">FAQ TOPICS</a>
            </li>
          </ul>
        </div>
        <div class="fnav-2">
          <h6>Catalog</h6>

          <ul>
            <li>
              <a href="#">HOODIE</a>
            </li>
            <li>
              <a href="#">T-SHIRT</a>
            </li>
            <li>
              <a href="#">PANTS</a>
            </li>
            <li>
              <a href="#">AWEETSHIRT</a>
            </li>
            <li>
              <a href="#">COAT</a>
            </li>
            <li>
              <a href="#">VIEW ALL</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="box-2">
      <h3>GET<span> IN TOUCH</span></h3>
      <div>
        <div class="info phone">
          <h6>Phone</h6>
          <p>000-111-2222</p>
        </div>
        <div class="info email">
          <h6>Email</h6>
          <p>yuji2222@gmail.com</p>
        </div>
        <div class="info adress">
          <h6>Adress</h6>
          <p>Tokyo, Japan, Takeshita Street</p>
        </div>
        <div class="info sns">
          <h6>SNS</h6>
          <p>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter-square"></i></a>
            <a href="#"><i class="fab fa-facebook-square"></i></a>
          </p>
        </div>
      </div>
    </div>
  </footer>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/62ab48940b.js" crossorigin="anonymous"></script>
</body>
</html>