<?php
include_once "database.php";
class User extends Database{
  public function createUser($first_name, $last_name, $username, $email, $password){

    $sql = "INSERT INTO users(`first_name`, `last_name`, `username`, `email`, `password`) VALUES ('$first_name','$last_name','$username','$email', '$password')";

    if($this->conn->query($sql)){


      session_start();

      $_SESSION["user_id"] = $this->conn->insert_id;
      $_SESSION["username"] = $username;
      
      
      header("location: ../views");
      exit;
    }else{
      die("Error creating user: ".$this->conn->error);
    }
  }

  public function signin($username, $password){
    $sql = "SELECT id, username, `password` from users where username = '$username'";

    if($result = $this->conn->query($sql)){

      if($result->num_rows == 1){

        $user_details = $result->fetch_assoc();

        if(password_verify($password, $user_details["password"])){
          session_start();

          $_SESSION["user_id"] = $user_details["id"];
          $_SESSION["username"] = $user_details["username"];


          if($user_details["id"] == "2"){

            header("location: ../views/dashboard.php");
          }else{
            header("location: ../views/user-page.php");
            exit;
          }
        }else{
          die("Password is incorrect.");
        }
      }else{
        die("Username not found.");
      }
    }else{
      // SELECT query failed.
    }
  }



  


}




?>