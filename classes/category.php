<?php
include_once "database.php";
class Category extends Database{
  public function addCategories($cat_name){
    $sql = "INSERT INTO categories(`cat_name`) VALUES ('$cat_name')";

    if ($this->conn->query($sql)){

      header("location: ../views/admin-categories.php");
      exit;
    }else{
      die("Error adding the category: ".$this->conn->error);
    }
  }

  public function getAllCategories(){
    $sql = "SELECT * FROM categories";

    if($result = $this->conn->query($sql)){

      return $result;

    }else{
      die("Error retrieving all categories".$this->conn->error);
    }
  }

  
}

?>