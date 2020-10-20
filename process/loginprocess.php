<?php
 if(isset($_POST)){
   $e =  $_POST['email'];
   $p1  = $_POST['password'];
    include('../db/connection.php');
    $sql = "SELECT * FROM users WHERE email = '$e'";
    $result = $conn->query($sql);
    if($result->num_rows==1){
        $row = $result->fetch_assoc();
        $hash = $row['password'];
         if(password_verify($p1,$hash)){
           session_start();
           $_SESSION['loginuser']=$e;
           header('Location:../profile.php');
         }else{
           echo  "password does not match";
         }
    }else{
      echo "no such a account with given email";
    }
 }else{
  echo "wrong request";
 }

?>
