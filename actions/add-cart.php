<?php
session_start();

include_once "../classes/cart.php";

$quantity = $_POST["quantity"];
$size = $_POST["size"];
$prod_id = $_POST["prod_id"];
$customer_id = $_SESSION["user_id"];

$cart = new Cart;

$cart->addToCart($prod_id, $size, $quantity, $customer_id);


?>