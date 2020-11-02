<?php
  include('user.php');
  include('../db/connection.php');
  if(isset($_POST)){
    $title = $_POST['title'];
    $id = getLoginUserId($conn);
    $sql = "INSERT INTO incomecategory (title,user_id) VALUES ('$title','$id')";
    if($conn->query($sql)){
      header('Location:../profile.php?msg=successfully inserted');
    }else{
      header('Location:../profile.php?errmsg=some error occured');
    }

  }
?>
