<?php
include "../classes/product.php";

$prod_name = $_POST["prod_name"];
$cat_id = $_POST["category_id"];
$size = $_POST["size"];
$quantity = $_POST["quantity"];
$prod_price = $_POST["price"];
$prod_photo = $_FILES["prod_photo"]["name"];
$tmp_photo = $_FILES["prod_photo"]["tmp_name"];

$new_prod = new Product;

$new_prod->addProdData($prod_name, $prod_price, $prod_photo, $tmp_photo, $size, $quantity, $cat_id);

?>