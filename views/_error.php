<?php

/**@var $exception \Exception */
?>
<div class="container mt-4 text-center ">
<div class="alert alert-danger">
<h2><?php echo $exception->getCode()?>-<?php echo $exception->getMessage()?></h2>

</div>
</div>