<?php

?>
<div class="container">
  <h1 class="Register">Register</h1>

  <form action="" method="POST">
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="firstname" class="form-label mt-4">firstname<label>
          <input type="text" name="firstname" value="<?php echo $model->firstname ?>"
          class="form-control<?php echo $model->hasError('firstname') ? ' is-invalid':'' ?>" >
          <div class="invalid-feedback">
            <?php echo $model->getFirstError('firstname') ?> 
          </div>
        </div> 
      </div>

      <div class="col">
        <div class="form-group">
          <label for="lastname" class="form-label mt-4">lastname</label>
          <input type="text" name="lastname" value="<?php echo $model->lastname ?>"
          class="form-control<?php echo $model->hasError('lastname') ? ' is-invalid':'' ?>" >
          <div class="invalid-feedback">
            <?php echo $model->getFirstError('lastname') ?> 
          </div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
      <input type="text" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $model->email ?>"
      class="form-control<?php echo $model->hasError('email') ? ' is-invalid':'' ?>" >
          <div class="invalid-feedback">
            <?php echo $model->getFirstError('email') ?> 
          </div>
    </div>
    <div class="form-group">
      <label for="password" class="form-label mt-4">Password</label>
      <input type="password" name="password" placeholder="Password"
      class="form-control<?php echo $model->hasError('password') ? ' is-invalid':'' ?>"  >
          <div class="invalid-feedback">
            <?php echo $model->getFirstError('password') ?> 
          </div>
    </div>

    <div class="form-group">
      <label for="ConfirmPassword" class="form-label mt-4">ConfirmPassword</label>
      <input type="password" name="confirmPassword" placeholder="ConfirmPassword"
      class="form-control<?php echo $model->hasError('confirmPassword') ? ' is-invalid':'' ?>" >
          <div class="invalid-feedback">
            <?php echo $model->getFirstError('confirmPassword') ?> 
          </div>
    </div>

    <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">submit</button>
  </form>
</div>