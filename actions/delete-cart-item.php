<?php

include "../classes/cart.php";

$cart_id = $_GET["cart_id"];

$item = new Cart;
$item->deleteCartItem($cart_id);

?>