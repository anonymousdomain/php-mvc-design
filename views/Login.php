<div class="container">
  <h1 class="text-center">Login</h1>

  <?php $form = \app\core\form\Form::begin('', "post") ?>
  <?php echo $form->field($model, 'email') ?>
  <?php echo $form->field($model, 'password')->typeField('password') ?>
  <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">submit</button>
  <?php \app\core\form\Form::end() ?>
</div>