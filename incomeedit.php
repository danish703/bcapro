<?php
  include('db/connection.php');
  include('include/header.php');
  include('process/user.php');
  $userid = getLoginUserId($conn);
  $id = $_GET['id'];
  $incomeSql = "SELECT * FROM income WHERE id='$id'";
  $sql = "SELECT * FROM incomecategory WHERE user_id = '$userid'";
  $incomeCat = $conn->query($sql);
  $result = $conn->query($incomeSql);
  $data = $result->fetch_assoc();
 ?>
 <div class="container">
   <div class="row jusity-content-end">
      <form class="" action="process/incomeeditprocess.php" method="post">
        <div class="form-group row">
           <label for="incomeTitle" class="col-sm-2 col-form-label">Title</label>
           <div class="col-md-12">
             <input type="text" name='title' value="<?php echo $data['title'];?>" class="form-control" id="incomeTitle">
           </div>
         </div>
         <div class="form-group row">
            <label for="amount" class="col-sm-2 col-form-label">Amount</label>
            <div class="col-md-12">
              <input type="number" value="<?php echo $data['amount'];?>" name='amount' class="form-control" id="amount">
            </div>
          </div>
          <div class="form-group row">
             <label for="date" class="col-sm-2 col-form-label">Date</label>
             <div class="col-md-12">
               <input type="date" value="<?php echo $data['date'];?>" name='date' class="form-control" id="date">
             </div>
           </div>
           <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
           <div class="form-group row">
              <label for="date" class="col-sm-2 col-form-label">Income Category</label>
              <div class="col-sm-10">
                <select class="form-control" name="icid">
                  <?php
                  while($row=$incomeCat->fetch_assoc()){ ?>

                   <option value="<?php echo $row['id']; ?>" <?php if($data['incomecategory_id']==$row['id']){ echo 'selected'; } ?>><?php echo $row['title'];?></option>

                 <?php  } ?>
                </select>
              </div>
            </div>
          <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
  </div>
