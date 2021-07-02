<?php
include_once "database.php";
class Cart extends Database{
  
  public function addToCart($prod_id, $size, $quantity, $customer_id){
    // prod price = $thisconn->getProdPrice($prod_id);
    // total = prod price * $quantity;
    $prod_price = $this->getProdPrice($prod_id);
    $total = $prod_price * $quantity;
    
    $sql = "INSERT INTO cart(`prod_id`, `size`, `quantity`, `customer_id`, `total`) VALUES ('$prod_id','$size', '$quantity', '$customer_id', '$total')";
    
    if($this->conn->query($sql)){
      
      header("location: ../views/all-products.php");
      exit;
    }else{
      die("Error showing products.".$this->conn->error);
    }
  }

  private function getProdPrice($prod_id){
    $sql = "SELECT prod_price from products WHERE prod_id = '$prod_id'";

    // if result = thisconn
    // $prod = $result->fetch_)assoc
    // return $prod['prod_price'];
    // else
    if($result = $this->conn->query($sql)){

      $prod = $result->fetch_assoc();
      return $prod["prod_price"];
    }else{
      die ("Error getting products data".$this->conn->error);
    }
  }

  public function getTotalPrice($customer_id){
    $sql = "SELECT SUM(total) from cart WHERE customer_id = $customer_id";

    if($result = $this->conn->query($sql)){

      $prod = $result->fetch_assoc();
      $total_price = $prod["SUM(total)"];

      if($total_price == 0){
        return false;
      }else{
        return $total_price;
      }
    }else{
      die("Error geting total.".$this->conn->error);
    }
  }

  public function getTotalQty($customer_id){
    $sql = "SELECT SUM(quantity) from cart WHERE customer_id = $customer_id";

    if($result = $this->conn->query($sql)){

      $prod = $result->fetch_assoc();
      $total_qty = $prod["SUM(quantity)"];

      if($total_qty == 0){
        return 0;
      }else{
        return $total_qty;
      }
    }else{
      die("Error getting number.".$this->conn->error);
    }
  }

  public function getCart($customer_id){
    $sql = "SELECT id, cart.prod_id, size, quantity, prod_price, prod_name, prod_photo,total FROM cart inner join products on products.prod_id = cart.prod_id WHERE customer_id = $customer_id";

    if($result = $this->conn->query($sql)){
      return $result;
    }else{
      die ("Error getting products data.". $this->conn->error);
    }
  }

  public function deleteCartItem($cart_id){
    $sql = "DELETE from cart WHERE id = $cart_id";

    if($this->conn->query($sql)){
      header("location: ../views/cart.php");
      exit;
    }else{
      die("Error deleting the product.");
    }
  }

  public function checkOut($customer_id, $total_quantity, $total_price, $checkout_date){
    $sql = "INSERT INTO orders (`customer_id`, `total_quantity`,`total_price`,`checkout_date`) VALUES ('$customer_id','$total_quantity','$total_price','$checkout_date')";

    if($this->conn->query($sql)){
      $order_id = $this->conn->insert_id;
      
      $this->deleteCart($customer_id);

      header("location: ../views/confirmation.php?order_id=$order_id");
      exit;
    }else{
      die("Error adding data.".$this->conn->error);
    }
  }

  private function deleteCart($customer_id){
    $sql = "DELETE FROM cart WHERE customer_id = $customer_id";

    if($this->conn->query($sql)){
      
    }
  }


  
}

?>

