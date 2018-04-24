<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h1 style="color:black">Add Task</h1>
    </div>
  </div>
</div>
<br />
<div class="container" >
  <div class="row">
    <div class="col-md-5">
      <form method="post" action="?controller=todo&action=createTask"  >
        <div class="form-group">
          <label for="duedate">Due Date:</label>
          <input  class="form-control" type="date" name="duedate" id="duedate" required><br>
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <input  class="form-control" type="text" name="message" id="message" required><br>
        </div>
        <div class="form-group">
          <input class="btn btn-success" id="button" type="submit">
          <input class="btn btn-secondary" id= "reset" type="reset">
        </div>
      </form>
    </div>
  </div>
</div>
