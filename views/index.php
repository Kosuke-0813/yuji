<?php
session_start();

include "../classes/category.php";

// object
$categories = new Category;
$category_list = $categories->getAllCategories();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, shrink-to-fit=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
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
            <a href="index.php" class="dropdown-item">HOME</a>
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
              <a href="#" class="dropdown-item"><?= $cat_details["cat_name"]?></a>
              <?php
              }
              ?>
            </div>
          </div>
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
    <div class="bg-img">
      <p>YUJI</p>
    </div>

    <div class="container">
      <div class="content-1">
        <div id="carousel-1" class="carousel slide" data-ride="carousel" data-interval="4500">
          <ol class="carousel-indicators">
            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-1" data-slide-to="1"></li>
            <li data-target="#carousel-1" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="../images/pic-1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="../images/pic4.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="../images/pic-5.jpg" alt="Third slide">
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
      <div class="text-1">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere libero cumque quam beatae dolor harum aut blanditiis et veniam tempora laboriosam, possimus sint? Nisi repellendus saepe ex quod sit doloremque necessitatibus quam, architecto ipsam non eligendi dolor fugit aperiam doloribus modi magni voluptates soluta facere provident id eius autem! Ratione. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore ullam ratione minus minima sequi modi a corrupti. Corrupti, totam alias facere quos maxime laboriosam nam neque itaque illum qui autem!
      </div>
      <div class="content-2">
        <div id="carousel-2" class="carousel slide" data-ride="carousel" data-interval="6000">
          <ol class="carousel-indicators">
            <li data-target="#carousel-2" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-2" data-slide-to="1"></li>
            <li data-target="#carousel-2" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="../images/pic-6.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="../images/pic-7.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="../images/pic-8.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carousel-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

        <div class="text-2">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere libero cumque quam beatae dolor harum aut blanditiis et veniam tempora laboriosam, possimus sint? Nisi repellendus saepe ex quod sit doloremque necessitatibus quam, architecto ipsam non eligendi dolor fugit aperiam doloribus modi magni voluptates soluta facere provident id eius autem! Ratione. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam repudiandae vitae, esse asperiores atque doloremque minima maxime assumenda aperiam ad amet deserunt modi id voluptate fugiat quos fugit ea aut?
        </div>

        <h2>INSTAGRAM POSTS</h2>
        <div class="instagram">

          <div class="post post-1">
            <div id="carousel-3" class="carousel slide" data-ride="carousel" data-interval="3000">
              <ol class="carousel-indicators">
                <li data-target="#carousel-3" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-3" data-slide-to="1"></li>
                <li data-target="#carousel-3" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="../images/slider-1.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="../images/slider-2.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="../images/slider-3.jpeg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carousel-3" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel-3" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>

          <div class="post post-2">
            <div id="carousel-4" class="carousel slide" data-ride="carousel" data-interval="6000">
              <ol class="carousel-indicators">
                <li data-target="#carousel-4" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-4" data-slide-to="1"></li>
                <li data-target="#carousel-4" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="../images/slider-4.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="../images/slider-2.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="../images/slider-3.jpeg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carousel-4" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel-4" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div class="post post-3">
            <div id="carousel-5" class="carousel slide" data-ride="carousel" data-interval="3000">
              <ol class="carousel-indicators">
                <li data-target="#carousel-5" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-5" data-slide-to="1"></li>
                <li data-target="#carousel-5" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="../images/slider-5.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="../images/slider-2.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="../images/slider-3.jpeg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carousel-5" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel-5" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div class="post post-4">
            <div id="carousel-6" class="carousel slide" data-ride="carousel" data-interval="6000">
              <ol class="carousel-indicators">
                <li data-target="#carousel-6" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-6" data-slide-to="1"></li>
                <li data-target="#carousel-6" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="../images/slider-6.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="../images/slider-2.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="../images/slider-3.jpeg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carousel-6" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel-6" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div class="post post-5">
            <div id="carousel-7" class="carousel slide" data-ride="carousel" data-interval="3000">
              <ol class="carousel-indicators">
                <li data-target="#carousel-7" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-7" data-slide-to="1"></li>
                <li data-target="#carousel-7" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="../images/slider-7.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="../images/slider-2.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="../images/slider-3.jpeg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carousel-7" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel-7" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div class="post post-6">
            <div id="carousel-8" class="carousel slide" data-ride="carousel" data-interval="6000">
              <ol class="carousel-indicators">
                <li data-target="#carousel-8" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-8" data-slide-to="1"></li>
                <li data-target="#carousel-8" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="../images/slider-8.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="../images/slider-2.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="../images/slider-3.jpeg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carousel-8" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel-8" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      <div class="content-3">
        <div id="carousel-9" class="carousel slide" data-ride="carousel" data-interval="4500">
          <ol class="carousel-indicators">
            <li data-target="#carousel-9" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-9" data-slide-to="1"></li>
            <li data-target="#carousel-9" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="../images/pic-1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="../images/pic4.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="../images/pic-5.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carousel-9" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-9" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="text-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere libero cumque quam beatae dolor harum aut blanditiis et veniam tempora laboriosam, possimus sint? Nisi repellendus saepe ex quod sit doloremque necessitatibus quam, architecto ipsam non eligendi dolor fugit aperiam doloribus modi magni voluptates soluta facere provident id eius autem! Ratione. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore ullam ratione minus minima sequi modi a corrupti. Corrupti, totam alias facere quos maxime laboriosam nam neque itaque illum qui autem!
      </div>
      <div class="content-4">
        <div id="carousel-10" class="carousel slide" data-ride="carousel" data-interval="4500">
          <ol class="carousel-indicators">
            <li data-target="#carousel-10" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-10" data-slide-to="1"></li>
            <li data-target="#carousel-10" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="../images/pic-1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="../images/pic4.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="../images/pic-5.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carousel-10" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-10" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="text-4">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere libero cumque quam beatae dolor harum aut blanditiis et veniam tempora laboriosam, possimus sint? Nisi repellendus saepe ex quod sit doloremque necessitatibus quam, architecto ipsam non eligendi dolor fugit aperiam doloribus modi magni voluptates soluta facere provident id eius autem! Ratione. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore ullam ratione minus minima sequi modi a corrupti. Corrupti, totam alias facere quos maxime laboriosam nam neque itaque illum qui autem!
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