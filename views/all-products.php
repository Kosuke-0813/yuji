<?php
session_start();

include "../classes/category.php";
include "../classes/product.php";
include "../classes/cart.php";


// object
$categories = new Category;
$category_list = $categories->getAllCategories();

$products = new Product;
$size = new Product;

$cart = new Cart;


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, shrink-to-fit=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="css/all-products.css">
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
    <div class="slide">
      <div class="content-1">
        <div id="carousel-1" class="carousel slide" data-ride="carousel" data-interval="6500">
          <ol class="carousel-indicators">
            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-1" data-slide-to="1"></li>
            <li data-target="#carousel-1" data-slide-to="2"></li>
            <li data-target="#carousel-1" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active slide-1">
              <p>YUJI</p>
            </div>
            <div class="carousel-item slide-2">
              <ul>
                <li class="bg-nav-1"><a href="user-page.php">HOME</a></li>
                <li class="bg-nav-2"><a href="#">ABOUT</a></li>
                <li class="bg-nav-3"><a href="#">SHIPPING</a></li>
                <li class="bg-nav-4"><a href="#">CONTACTS</a></li>
                <li class="bg-nav-5"><a href="#">FAQ TOPICS</a></li>
              </ul>
            </div>
            <div class="carousel-item slide-3">
              <img class="sunglass" src="../images/slides-sub-1.png" width="1300px" alt="sunglass">
              <p>EYEVAN <br> ¥34,000</p>
              <img class="bag" src="../images/slides-sub-2.png" width="1200px"  alt="sunglass">
              <p>HERMES <br> ¥92,000</p>
            </div>
            <div class="carousel-item slide-4">
              <div class="catalog">
                <h4>-Catalog-</h4>
                <ul>
                  <?php
                  $category_list = $categories->getAllCategories();
                  
                  while($cat_details = $category_list->fetch_assoc()){
                  ?>
                  <li><a href="all-products.php#<?= $cat_details["id"]?>"><?= $cat_details["cat_name"]?></a></li>
                  <?php
                  }
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>

    <div class="container">
      <?php
      $category_list = $categories->getAllCategories();

      while ($cat_details = $category_list->fetch_assoc()){
      ?>
      <h2 class="prod-name" id="<?= $cat_details["id"]?>"><?= $cat_details["cat_name"]?></h2>

      <div class="product">
        <?php
        $product_list = $products->getProdByCat($cat_details["id"]);

        while($prod_details = $product_list->fetch_assoc()){
          // print_r($prod_details);
        ?>
        <div class="prod-info">
          <img src="../images/<?= $prod_details["prod_photo"]?>" alt="<?= $prod_details["prod_name"]?>" width="250px" height="370px">
          <p><?= $prod_details["prod_name"]?></p>
          
          <div class="price">
            ¥<?= $prod_details["prod_price"]?>

            <form action="../actions/add-cart.php" method="post">
              <input type="hidden" name="prod_id" value="<?= $prod_details["prod_id"]?>">
              <input type="number" min="1" name="quantity" required>

              <select name="size" id="size">
                <?php
                $size_list = $size->getProdSize($prod_details['prod_id']);
                // print_r($size_list);
                while($size_details = $size_list->fetch_assoc()){
                ?>
                <option value="<?= $size_details['size']?>"><?= $size_details['size'] . " - " . $size_details['quantity'] ?></option>
                <?php
                }
                ?>
              </select>
              
              <button type="submit"><i class="fas fa-cart-plus btn"></i></button> 
            </form>
    
          </div>

        </div>
        <?php
        }
        ?>
      </div>
      <?php
      } #closing category
      ?>
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