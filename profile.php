<?php include('config/sessioncheck.php');?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3>Profile page</h3>
     <h2><?php echo $_SESSION['loginuser'];?></h2>
     <a href="process/logoutprocess.php">Logout</a>
  </body>
</html>
