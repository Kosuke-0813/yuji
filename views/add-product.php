<?php
session_start();
include "../classes/category.php";
// object
$categories = new Category;
$category_list = $categories->getAllCategories();

include "../classes/product.php";

$products = new Product;
$product_list = $products->getProdName();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, shrink-to-fit=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="css/add-product.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
  <title>YUJI -Admin Add Products-</title>
</head>
<body>
  <header>
    <h1>YUJI</h1>

    <nav>
      <div class="navbar">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-1" aria-expanded="false"> 
          <i class="fas fa-grip-lines"></i>
        </button>
        <div class="top-nav">
          <div class="collapse navbar-collapse dropdown-menu" id="navbar-1">
            <a href="#" class="dropdown-item">HOME</a>
            <a href="#" class="dropdown-item">ABOUT</a>
            <a href="#" class="dropdown-item">SHIPPING</a>
            <a href="#" class="dropdown-item">CONTACTS</a>
            <a href="#" class="dropdown-item">FAQ TOPICS</a>
          </div>
        </div>

        <div class="dropright">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-2" aria-expanded="false"> 
            <i class="fas fa-th-large"><span> CATALOG</span></i>
          </button>
          <div class="top-nav">
            <div class="collapse navbar-collapse dropdown-menu " id="navbar-2">
              <a href="#" class="dropdown-item">HOODIE</a>
              <a href="#" class="dropdown-item">T-SHIRT</a>
              <a href="#" class="dropdown-item">PANTS</a>
              <a href="#" class="dropdown-item">AWEETSHIRT</a>
              <a href="#" class="dropdown-item">COAT</a>
              <a href="#" class="dropdown-item">VIEW ALL</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <div class="sign-in">
    <?php
      if (!empty($_SESSION)){
        
        echo "<p class='hello'>Hello, ".$_SESSION["username"]."<a href='../actions/logout.php' class='logout text-danger'>"." ". "SIGN OUT</a>"."</p>";

      }
      ?>
    </div>
  </header>
  <main>
  <nav class="dash-nav">
      <h2>Add products</h2>
      <ul>
        <li>
          <a href="#">Products</a>
        </li>
        <li>
          <a href="#">All users</a>
        </li>
      </ul>

      <div class="data-add">
        <ul>
          <li><a href="admin-categories.php">Add Category</a></li>
        </ul>
      </div>

    </nav>
    <div class="container">
      
      <div class="row h-100 m-0">
          <div class="form-1 card-body">
            <h3>For new products</h3>

            <form action="../actions/add-product.php" method="post" enctype="multipart/form-data">

              <label for="prod_name">Name of product</label>
              <input type="text" name="prod_name" id="prod_name" class="form-control mb-2" required autofocus>
              
              <label for="category">Category</label>
              <select name="category_id" id="category" class="form-control mb-2" required>
                <option value="" hidden>select the category</option>

                <?php
                while($cat_details = $category_list->fetch_assoc()){
                ?>
                <option value="<?= $cat_details["id"] ?>"><?= $cat_details["cat_name"]?></option>
                
                <?php
                }
                ?>
              </select>

              <label for="size">Size</label>
              <select name="size" id="size" class="form-control mb-2" required>
                <option value="" hidden>select the size</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
              </select>
              
              
              <label for="quantity">Quantity</label>
              <input type="number" name="quantity" id="quantity" class="form-control mb-2" required>
              
              <label for="price">Price</label>
              <div class="input-group mb-5">
                <div class="input-group-prepend">
                  <span class="input-group-text">¥</span>
                </div>
                <input type="number" name="price" id="price" class="form-control"  required >
              </div>

              <div class="custom-file mb-4">
                <label for="photo" class="custom-file-label">Choose Photo</label>
                <input type="file" name="prod_photo"  id="photo" class="custom-file-input" accept="image/*" required>
              </div>
              
              <button type="submit" class="btn btn-success btn-block">Add Product</button>
              
            </form>
          </div>
        
          <div class="form-2 card-body">
            <h3>For same products</h3>
            <form action="../actions/add-same-prod.php" method="post">

              <label for="prod_name">Select a Product</label>
              <select name="prod_id" id="prod_name" class="form-control mb-2" required>
                <option value="" hidden>select a product</option>
                <?php
                while($prod_details = $product_list->fetch_assoc()){
                ?>

                <option value="<?= $prod_details["prod_id"] ?>"><?= $prod_details["prod_name"]?></option>

                <?php
                }
                ?>
              </select>
              
              <label for="size">Size</label>
              <select name="size" id="size" class="form-control mb-2" required>
                <option value="" hidden>select the size</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
              </select>

              <label for="quantity">Quantity</label>
              <input type="number" name="quantity" id="quantity" class="form-control mb-5" required>

              <button type="submit" class="btn btn-success btn-block">Add Product</button>
              
            </form>
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