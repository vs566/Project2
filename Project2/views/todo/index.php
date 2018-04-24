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
          <thead>
            <th style="width:55%">Task</th>
            <th style="width:20%">Due Date</th>
            <th style="width:10%"></th>
            <th style="width:10%"></th>
            <th style="width:10%"></th>
          </thead>
          <?php foreach($results as $res):?>
            <tr>
              <?php if ($res['isdone'] == 0) { ?>
                <td> <?php echo $res['message'];?></td>
                <td> <?php echo date('Y-m-d', strtotime($res['duedate']));?></td>
                <td>
                  <form method='post' action='?controller=todo&action=editTask'>
                    <input type="hidden" name = 'item_id' value="<?php echo $res['id']; ?>"/>
                    <input type="submit" class="btn btn-primary" value="Edit"/>
                  </form>
                </td>
                <td>
                  <form method='post' action='?controller=todo&action=deleteTask'>
                    <input type="hidden" name = 'item_id' value="<?php echo $res['id'];?>"/>
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                  </form>
                </td>
                <td>
                  <form method='post' action='?controller=todo&action=completeTask'>
                    <input type="hidden" name = 'item_id' value="<?php echo $res['id'];?>"/>
                    <input type="submit" class="btn btn-success" value="Complete"/>
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
  <form method="post" action='?controller=todo&action=addTask'>
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
            <th style="width:55%">Task</th>
            <th style="width:20%">Due Date</th>
            <th style="width:10%"></th>
            <th style="width:10%"></th>
            <th style="width:10%"></th>
          </thead>

             <?php foreach($results as $res):?>
              <tr>
                <?php $item_status = $res['isdone'];
                  if ($item_status == 1){
                ?>
                  <td> <span style='text-decoration:line-through; font-style: italic; color: #c1c1c1'><?php echo $res['message'];?></span></td>
                  <td> <span style='text-decoration:line-through; font-style: italic; color: #c1c1c1'><?php echo date('Y-m-d', strtotime($res['duedate']));?></span></td>
                  <td>
                    <form method='post' action='?controller=todo&action=editTask'>
                      <input type="hidden" name = 'item_id' value="<?php echo $res['id']; ?>"/>
                      <input type="submit" class="btn btn-primary" value="Edit"/>
                    </form>
                  </td>
                  <td>
                    <form method='post' action='?controller=todo&action=deleteTask' >
                      <input type="hidden" name = 'item_id' value="<?php echo $res['id'];?>"/>
                      <input type="submit" class="btn btn-danger" value="Delete"/>
                    </form>
                  </td>
                  <td>
                    <form method='post' action='?controller=todo&action=incompleteTask' >
                      <input type="hidden" name = 'item_id' value="<?php echo $res['id'];?>"/>
                      <input type="submit" class="btn btn-success" value="Incomplete"/>
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
  <form method="post" action='?controller=auth&action=logout' >
    <input type="submit" class="btn btn-warning" value="Log Out"/>
  </form>
</div>
