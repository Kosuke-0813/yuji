<?php
include_once "database.php";
class Order extends Database{
  public function getOrder($order_id){
    $sql = "SELECT first_name,last_name,email, total_quantity,total_price,checkout_date FROM orders INNER JOIN users ON users.id = orders.customer_id WHERE orders.id = $order_id";

    if($result = $this->conn->query($sql)){

      return $result->fetch_assoc();
    }else{
      die("Error getting orders.". $this->conn->error);
    }
  }
  
  
 


  
}

?>



