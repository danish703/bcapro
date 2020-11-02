<?php

function getLoginUserId($conn){
  session_start();
  $e = $_SESSION['loginuser'];
  $sql = "SELECT * FROM users WHERE email = '$e'";
  $result = $conn->query($sql);
  if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    return $row['id'];
  }
}

?>
