<?php
  include('db/connection.php');
  include('include/header.php');
 ?>
 <div class="container">
   <?php $pass= "nepal@123";
       $hash = password_hash($pass,PASSWORD_DEFAULT);
      if (password_verify($pass, $hash)) {
            echo "Let me in, I'm genuine!";
        }
      ?>

  home page
 </div>
 <?php include('include/footer.php');?>
