<?php
  include('user.php');
  include('../db/connection.php');
  if(isset($_POST)){
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $icid = $_POST['icid'];
    $id = $_POST['id'];
    $userid = getLoginUserId($conn);
    $sql = "UPDATE income SET title = '$title',amount='$amount',`date`='$date',`incomecategory_id`='$icid' WHERE `id`='$id'";
    if($conn->query($sql)){
      header('Location:../profile.php?msg=successfully updated');
    }else{
      header('Location:../profile.php?errmsg='.$conn->error);
    }

  }
?>
