<?php $incomeCat = $conn->query($sql); ?>

<div class="modal fade" id="addIncome" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form method="post" action="process/incomeinsert.php">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Income</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
           <label for="incomeTitle" class="col-sm-2 col-form-label">Title</label>
           <div class="col-sm-10">
             <input type="text" name='title' class="form-control" id="incomeTitle">
           </div>
         </div>
         <div class="form-group row">
            <label for="amount" class="col-sm-2 col-form-label">Amount</label>
            <div class="col-sm-10">
              <input type="number" name='amount' class="form-control" id="amount">
            </div>
          </div>
          <div class="form-group row">
             <label for="date" class="col-sm-2 col-form-label">Date</label>
             <div class="col-sm-10">
               <input type="date" name='date' class="form-control" id="date">
             </div>
           </div>
           <div class="form-group row">
              <label for="date" class="col-sm-2 col-form-label">Income Category</label>
              <div class="col-sm-10">
                <select class="form-control" name="icid">
                  <?php
                  while($row=$incomeCat->fetch_assoc()){ ?>
                   <option value="<?php echo $row['id']; ?>"><?php echo $row['title'];?></option>

                 <?php  } ?>
                </select>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </form>
  </div>
</div>

<!-- Recnent Expenses -->

<div class="modal fade" id="addExpenses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Expenses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- add Income Category PopBox -->

<div class="modal fade" id="addIncomeCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="process/incomeCategoryInsert.php">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Income Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group row">
           <label for="incomeCategoryTitle" class="col-sm-2 col-form-label">Title</label>
           <div class="col-sm-10">
             <input type="text" name='title' class="form-control" id="incomeCategoryTitle">
           </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </form>
  </div>
</div>
