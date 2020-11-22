<?php
  include('db/connection.php');
  include('include/header.php');
  include('process/user.php');
  $id = getLoginUserId($conn);
  $sql = "SELECT * FROM incomecategory WHERE user_id = '$id'";
  $incomeSql = "SELECT * FROM income WHERE user_id = '$id' ORDER BY `date` DESC LIMIT 5";
  $incomeSqlTotal = "SELECT sum(`amount`) as total FROM income WHERE user_id = '$id'";
  $incomeCategory = $conn->query($sql);
  $allincome = $conn->query($incomeSql);
  $total = $conn->query($incomeSqlTotal);
  $today = date('Y-m-d');
  $todayIncomeQuery = "SELECT count(*) as c FROM income WHERE date='$today' GROUP BY date";
  $totaltodayIncome = $conn->query($todayIncomeQuery);
 ?>
 <div class="container">
   <div class="row justify-content-end">
      <div class="col-4">
        <div class="card  text-white bg-primary">
          <h5 class="card-header">Total Income</h5>
          <div class="card-body">
            <h5 class="card-title">Rs. <?php echo $total->fetch_assoc()['total'];?></h5>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card  text-white bg-danger">
          <h5 class="card-header">Total Expenses</h5>
          <div class="card-body">
            <h5 class="card-title">Rs 30000</h5>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card text-white bg-success">
        <h5 class="card-header">Total Saving</h5>
        <div class="card-body">
          <h5 class="card-title">Rs.17000</h5>
        </div>
        </div>
      </div>
   </div>
   <hr/>
   <div class="row justify-content-end">
      <div class="col-4">
        <div class="card  text-white bg-primary">
          <h5 class="card-header">Today total income transaction</h5>
          <div class="card-body">
            <h5 class="card-title"> <?php echo $totaltodayIncome->fetch_assoc()['c'];?></h5>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card  text-white bg-danger">
          <h5 class="card-header">Total Expenses</h5>
          <div class="card-body">
            <h5 class="card-title">Rs 30000</h5>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card text-white bg-success">
        <h5 class="card-header">Total Saving</h5>
        <div class="card-body">
          <h5 class="card-title">Rs.17000</h5>
        </div>
        </div>
      </div>
   </div>
   <hr/>
   <div class="row jusity-content-end">
       <div class="col-6">
         <div class="card">
            <div class="card-header">
              <span>Recent Income</span>
              <span><a href="#" data-toggle="modal" data-target="#addIncome" style="float:right;"  data-toggle="tooltip" data-placement="top" title="Add New Income"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
              </svg></a></span>
            </div>
            <div class="card-body">
                <table class="table">
                   <thead>
                      <th>title</th>
                      <th>Date</th>
                      <th>Amount</th>
                   </thead>
                   <tbody>
                  <?php while($row=$allincome->fetch_assoc()){ ?>
                      <tr>
                        <td><?php echo $row['title'];?></td>
                        <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['amount'];?></td>
                      </tr>
                    <?php } ?>
                   </tbody>
                </table>
            </div>
            <div class="card-footer">
               <a href="allincome.php" style="float:right;">View more</a>
            </div>
         </div>
       </div>
       <div class="col-6">
         <div class="card">
            <div class="card-header">
                <span>Recent Expenses</span>
                <span><a href="#" data-toggle="modal" data-target="#addExpenses" style="float:right;"  data-toggle="tooltip" data-placement="top" title="Add New Expenses"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg></a></span>
            </div>
            <div class="card-body">
                <table class="table">
                   <thead>
                      <th>title</th>
                      <th>Date</th>
                      <th>Amount</th>
                   </thead>
                   <tbody>
                      <tr>
                        <td>Food</td>
                        <td>2020-10-31</td>
                        <td>Rs.899</td>
                      </tr>
                   </tbody>
                </table>
            </div>
            <div class="card-footer">
               <a href="#" style="float:right;">View more</a>
            </div>
         </div>
       </div>
   </div>
   <hr/>
   <div class="row justify-content-end">
      <div class="col-6">
        <div class="card">
           <div class="card-header">
             <span>My Income Categories</span>
             <span><a href="#" data-toggle="modal" data-target="#addIncomeCategory" style="float:right;"  data-toggle="tooltip" data-placement="top" title="Add Your Income Category"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
             <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
             </svg></a></span>
           </div>
           <div class="card-body">
             <?php if($incomeCategory->num_rows>0){
              ?>
               <table class="table">
                  <thead>
                     <th>title</th>
                     <th>Action</th>
                  </thead>
                  <tbody>
                <?php
                while($row = $incomeCategory->fetch_assoc()){
                   ?>
                     <tr>
                       <td><?php echo $row['title']; ?></td>
                       <td>Edit | Del </td>
                     </tr>
                   <?php  } ?>
                  </tbody>
               </table>
             <?php }else{ ?>
                    <p style="text-align:center;">No record found</p>
            <?php } ?>
           </div>
           <div class="card-footer">
              <a href="#" style="float:right;">View more</a>
           </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
           <div class="card-header">
             <span>My Expenses Categories</span>
             <span><a href="#" style="float:right;"  data-toggle="tooltip" data-placement="top" title="Add Your Expenses Category"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
             <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
             </svg></a></span>
           </div>
           <div class="card-body">
               <table class="table">
                  <thead>
                     <th>title</th>
                     <th>Action</th>
                  </thead>
                  <tbody>
                     <tr>
                       <td>Fooding</td>
                       <td>Edit | Del </td>
                     </tr>
                  </tbody>
               </table>
           </div>
           <div class="card-footer">
              <a href="#" style="float:right;">View more</a>
           </div>
        </div>
      </div>
   </div>
 </div>
 <?php include('include/addPopBox.php'); include('include/footer.php');?>
