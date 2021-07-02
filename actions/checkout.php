<?php
include "../classes/cart.php";
$cart = new Cart;

session_start();

$customer_id = $_SESSION["user_id"];
$total_quantity = $cart->getTotalQty($customer_id);
$total_price = $cart->getTotalPrice($customer_id);
date_default_timezone_set("Asia/Tokyo");
$checkout_date = date("Y-m-d H:i:s");

$cart->checkOut($customer_id, $total_quantity, $total_price, $checkout_date);
?>