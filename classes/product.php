<?php
include_once "database.php";
class Product extends Database{
  
  public function addProdData($prod_name, $prod_price, $prod_photo, $tmp_photo, $size, $quantity, $cat_id){
    // query command
    $sql = "INSERT INTO products(`prod_name`, `prod_price`, `prod_photo`, `cat_id`) VALUES ('$prod_name', '$prod_price', '$prod_photo', '$cat_id')";
    
    if($this->conn->query($sql)){
      $destination = "../images/$prod_photo";
      
      if(move_uploaded_file($tmp_photo, $destination)){
        $prod_id = $this->conn->insert_id;
        $sql = "INSERT INTO size_product(`prod_id`, `size`, `quantity`) VALUES ('$prod_id','$size', '$quantity')" ;

        if($this->conn->query($sql)){

          header("location: ../views/dashboard.php");
          exit;
        }else{
          die("Error adding size.");
        }
      }else{
        die("Error moving the photo.");
      }
    }else{
      die("Error creating product: ".$this->conn->error);
    }
  }

  public function getProdName(){
    $sql = "SELECT * FROM products";

    if($result = $this->conn->query($sql)){
       return $result;
    }else{
      die("Error getting products data".$this->conn->error);

    }
  }

  public function addSameProd($prod_id, $size, $quantity){

    $sql = "INSERT INTO size_product(`prod_id`, `size`, `quantity`) VALUES ('$prod_id', '$size', '$quantity')";

    if($this->conn->query($sql)){

      header("Location: ../views/dashboard.php");
      exit;
    }else{
      die("Error adding product.");
    }
  }

  public function getProdByCat($cat_id){
    $sql = "SELECT prod_id, prod_name, prod_price, prod_photo FROM products where cat_id = $cat_id";

    if($result = $this->conn->query($sql)){
      return $result;
    }else{
      die ("Error getting products data.");
    }

  }

  public function getProdSize($prod_id){
    $sql = "SELECT prod_id, size, quantity FROM size_product WHERE prod_id = $prod_id";

    if($result = $this->conn->query($sql)){
      return $result;
    }else{
      die("No sizes here.");
    }
  }

  

  
}

?>