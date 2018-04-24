<div class="container" >
  <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
      <h2 class="form-signin-heading">Please fill out form...</h2>
      <br />
      <form method="post" action="?controller=auth&action=createUser">
        <div class="form-group">
          <label for="fname">First Name:</label>
          <input class="form-control" type="text" name="fname" id="fname" required autofocus><br>
        </div>
        <div class="form-group">
          <label for="lname">Last Name:</label>
          <input class="form-control" type="text" name="lname" id="lname" required><br>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input class="form-control" type="email" name="email" id="email" required><br>
        </div>
        <div class="form-group">
          <label for="phone">Phone:</label>
          <input class="form-control" type="phone" name="phone" id="phone"><br>
        </div>
        <div class="form-group">
          <label for="dob">Date of Birth:</label>
          <input class="form-control" type="date" name="birthday" id="birthday"><br>
        </div>
        <div class="form-group">
          <label for="gender">Gender:</label><br>

          <label class="radio-inline">
            <input type="radio" name="gender" id="inlineRadio1" value="male" checked> Male
          </label>
          <label class="radio-inline">
            <input type="radio" name="gender" id="inlineRadio2" value="female"> Female
          </label>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input class="form-control" type="password" name="password" id="password" required><br>
        </div>

        <?php if (isset($errorMessage) && $errorMessage!="") { ?>
          <div class="alert alert-danger text-center">
            <strong><?php echo $errorMessage;?></strong>
          </div>
        <?php } ?>

        <div class="form-group text-center">
          <input class="btn btn-success" type="submit" value="Register">
          <input class="btn btn-secondary" id="reset" type="reset">
        </div>
      </form>
    </div>
    <div class="col-md-3">
    </div>
  </div>
</div>
