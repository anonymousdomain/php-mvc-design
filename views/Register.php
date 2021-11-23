<div class="container">
  <h1 class="text-center">create account</h1>

<?php $form=\app\core\form\Form::begin('',"post")?>
<div class="row">
  <div class="col">
  <?php echo $form->field($model,'firstname') ?>
  </div>
  <div class="col">
  <?php echo $form->field($model,'lastname') ?>
  </div>
</div>


<?php echo $form->field($model,'email') ?>
<?php echo $form->field($model,'password')->passwordField('password')?>
<?php echo $form->field($model,'confirmPassword')->passwordField('password') ?>
<button type="submit" class="btn btn-primary btn-lg btn-block mt-4">submit</button>
<?php \app\core\form\Form::end()?>
</div>