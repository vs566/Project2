<h1>
  Welcome <?php

  echo $account["fname"] . " " . $account["lname"]; ?>
</h1>

<div class="container">
  <br><hr class="colorgraph"><br>
  <div class="row">
    <div class="col-md-12">
      <h4>My Tasks</h4>
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped" style="color:black;">
          <?php foreach($results as $res):?>
            <tr>
              <?php $item_status = $res['isdone'];
                if ($item_status == 0){
              ?>
                <td> <?php echo $res['message'];?></td>
                <td> <?php echo $res['duedate'];?></td>
                <td>
                  <form action = 'edit.php' method = 'post' >
                    <input type="hidden" class="btn btn-danger" name = 'action' value="edit"/>
                    <input type="hidden" class="btn btn-danger" name = 'item_id' value="<?php echo $res['id']; ?>"/>
                    <input type="submit" class="btn btn-danger" value="edit"/>
                  </form>
                </td>
                <td>
                  <form action = '../View/delete.php' method = 'post' >
                    <input type="hidden" class="btn btn-danger" name = 'action' value="delete"/>
                    <input type="hidden" class="btn btn-danger" name = 'item_id' value="<?php echo $res['id'];?>"/>
                    <input type="submit" class="btn btn-danger" value="delete"/>
                  </form>
                </td>
                <td>
                  <form action = 'complete.php' method = 'post' >
                    <input type="hidden" class="btn btn-danger" name = 'action' value="complete"/>
                    <input type="hidden" class="btn btn-danger" name = 'item_id' value="<?php echo $res['id'];?>"/>
                    <input type="submit" class="btn btn-danger" value="Complete"/>
                  </form>
                </td>
              <?php } ?>
            </tr>
          <?php endforeach;?>
        </table>
      </div>
    </div>
  </div>
  <hr class="colorgraph">
  <form method="post" action = '?controller=todo&action=addTask'>
    <input type="submit" class="btn btn-info" value="Add New Task"/>
  </form>
</div>


<div class="container">
  <br><hr class="colorgraph"><br>
  <div class="row">
    <div class="col-md-12">
      <h4>Completed Tasks</h4>
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped" style="color:black;">
          <thead>
            <th style="width:65%">Task</th>
            <th style="width:10%">Due Date</th>
            <th style="width:10%">Edit</th>
            <th style="width:10%">Delete</th>
            <th style="width:10%">Status</th>
          </thead>
          <table>
             <?php foreach($results as $res):?>
              <tr>
                <?php $item_status = $res['isdone'];
                  if ($item_status == 1){
                ?>
                  <td> <span style='text-decoration:line-through; font-style: italic; color: #c1c1c1'><?php echo $res['message'];?></span></td>
                  <td> <span style='text-decoration:line-through; font-style: italic; color: #c1c1c1'><?php echo $res['duedate'];?></span></td>
                  <td>
                    <form action = 'edit.php' method = 'post' >
                      <input type="hidden" class="btn btn-danger" name = 'action' value="edit"/>
                      <input type="hidden" class="btn btn-danger" name = 'item_id' value="<?php echo $res['id']; ?>"/>
                      <input type="submit" class="btn btn-danger" value="edit"/>
                    </form>
                  </td>
                  <td>
                    <form action = '../View/delete.php' method = 'post' >
                      <input type="hidden" class="btn btn-danger" name = 'action' value="delete"/>
                      <input type="hidden" class="btn btn-danger" name = 'item_id' value="<?php echo $res['id'];?>"/>
                      <input type="submit" class="btn btn-danger" value="delete"/>
                    </form>
                  </td>
                  <td>
                    <form action = 'uncomplete.php' method = 'post' >
                      <input type="hidden" class="btn btn-danger" name = 'action' value="incomplete"/>
                      <input type="hidden" class="btn btn-danger" name = 'item_id' value="<?php echo $res['id'];?>"/>
                      <input type="submit" class="btn btn-danger" value="Incomplete"/>
                    </form>
                  </td>
                <?php } ?>
              </tr>
            <?php endforeach;?>
          </table>
        </table>
      </div>
    </div>
  </div>

  <hr class="colorgraph">
  <form action = 'logout.php' method = 'post' >
    <input type="submit" class="btn btn-warning" value="Log Out"/>
  </form>
</div>
