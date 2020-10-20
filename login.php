<?php
  include('db/connection.php');
  include('include/header.php');
 ?>

<div class="container">
   <div class="row justify-content-md-center">
      <div class="col-md-6">
         <div class="card text-white bg-success mb-3">
            <div class="card-header">
              Login page
            </div>
            <div class="card-body">
              <form method='POST' action='process/loginprocess.php'>
               <div class="form-group">
                 <label for="exampleInputEmail1">Email address</label>
                 <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

               </div>
               <div class="form-group">
                 <label for="exampleInputPassword1">Password</label>
                 <input type="password" name="password" class="form-control" id="exampleInputPassword1">
               </div>

               <button type="submit" class="btn btn-primary submit_btn">Submit</button>
              </form>
            </div>
         </div>
      </div>
   </div>
</div>

 <?php include('include/footer.php');?>
