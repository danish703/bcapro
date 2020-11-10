<?php
  include('db/connection.php');
  include('include/header.php');
  include('process/user.php');
  $id = getLoginUserId($conn);
  $incomeSql = "SELECT * FROM income WHERE user_id = '$id' ORDER BY `date` DESC";
  $incomeSqlTotal = "SELECT sum(`amount`) as total FROM income WHERE user_id = '$id'";
  $allincome = $conn->query($incomeSql);
  $total = $conn->query($incomeSqlTotal);
 ?>
 <div class="container">

   <div class="row jusity-content-end">
       <div class="col-12">
         <div class="card">
            <div class="card-header">
              <span>All Income</span>
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
                      <th>Action</th>
                   </thead>
                   <tbody>
                  <?php while($row=$allincome->fetch_assoc()){ ?>
                      <tr>
                        <td><?php echo $row['title'];?></td>
                        <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['amount'];?></td>
                        <td><a href="incomeedit.php?id=<?php echo $row['id'];?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a> | <a href="process/incomedelete.php?id=<?php echo $row['id'];?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></a></td>
                      </tr>
                    <?php } ?>
                    <tr>
                      <th>Total</th>
                      <td></td>
                      <th><?php echo $total->fetch_assoc()['total'];?></th>
                    </tr>
                   </tbody>
                </table>
            </div>
         </div>
       </div>
    </div>
  </div>
