<?php

?>
<div class="container">
  <h1 class="Register">Register</h1>

  <form action="" method="POST">
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="firstname" class="form-label mt-4">firstname</label>
          <input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo $model->firstname ?>">
        </div>
      </div>
      <div class="col">
      <div class="form-group">
      <label for="lastname" class="form-label mt-4">lastname</label>
      <input type="text" name="lastname" class="form-control" id="lastname" value="<?php echo $model->lastname ?>">
    </div>
      </div>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $model->email ?>">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="password" class="form-label mt-4">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="ConfirmPassword" class="form-label mt-4">ConfirmPassword</label>
      <input type="password" name="confirmPassword" class="form-control" id="ConfirmPassword" placeholder="ConfirmPassword">
    </div>
    <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">submit</button>
  </form>
</div>