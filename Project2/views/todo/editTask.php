<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h1 style="color:black">Edit Task</h1>
    </div>
  </div>
</div>
<br />
<div class="container" >
  <div class="row">
    <div class="col-md-5">
      <form method="post" action="?controller=todo&action=saveTask">
        <input type="hidden" name="item_id" class="form-control" id="item_id" value="<?php echo $id;?>" />
        <div class="form-group">
          <label>Task:</label>
          <input type="text" name="task" class="form-control" id="task" value= "<?php echo $task["message"] ?>" />
        </div>
        <div class="form-group">
          <label>Due Date:</label>
          <input type="date" name="duedate" class="form-control" id="duedate" value="<?php echo date('Y-m-d', strtotime($task["createddate"])) ?>"/>
        </div>
        <div class="form-group">
          <input class="btn btn-success" type="submit" value="Finish Editing"/>
        </div>
      </form>
    </div>
  </div>
</div> <!-- /container -->
