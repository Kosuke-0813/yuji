<?php
include "../classes/category.php";

$cat_name = $_POST["addcat"];


$new_cat = new Category;

$new_cat->addCategories($cat_name);


?>