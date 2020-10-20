<?php
 if(isset($_POST)){
   $f = $_POST['fname'];
   $e =  $_POST['email'];
   $p1  = $_POST['password'];
   $p2 = $_POST['password2'];

   if($p1==$p2){
     $hashpassword = password_hash($p1,PASSWORD_DEFAULT);
     $today = date("Y-m-d");
     include('../db/connection.php');
     $sql = "INSERT INTO users(email,full_name,password,date_join) VALUES ('$e','$f','$hashpassword','$today')";
     if($conn->query($sql)){
        header('Location:../login.php');
     }else{
       echo "error occured";
     }
   }else{
     echo "password does not match";
   }
 }else{
  echo "wrong request";
 }

?>
