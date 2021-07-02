<?php
include "../classes/product.php";

$prod_id = $_POST["prod_id"];
$size = $_POST["size"];
$quantity = $_POST["quantity"];

$same_prod = new Product;

$same_prod->addSameProd($prod_id, $size, $quantity);

?>