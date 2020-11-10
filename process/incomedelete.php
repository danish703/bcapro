<?php
    include('../db/connection.php');
  $id= $_GET['id'];
  $sql = "DELETE FROM income WHERE id='$id'";
  if($conn->query($sql)){
      header('Location:../allincome.php?msg=successfully deleted');
  }else{
     header('Location:../allincome.php?errmsg='.$conn->error);
  }
?>
