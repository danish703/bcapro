<?php
  include('user.php');
  include('../db/connection.php');
  if(isset($_POST)){
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $icid = $_POST['icid'];
    $userid = getLoginUserId($conn);
    $sql = "INSERT INTO income (title,amount,`date`,incomecategory_id,user_id) VALUES ('$title','$amount','$date','$icid','$userid')";
    if($conn->query($sql)){
      header('Location:../profile.php?msg=successfully inserted');
    }else{
      echo("Error:".$conn->error);
      //header('Location:../profile.php?errmsg=some error occured');
    }

  }
?>
