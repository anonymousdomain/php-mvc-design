<?php

use app\core\Application;
?>
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="/">Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact">contact</a>
        </li>
      </ul>
      <?php if(Application::isGuest()):?>
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="/register">Register
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login">Login</a>
        </li>
      </ul>
      <?php else: ?>
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="/logout">Welcome <?php echo Application::$app->user->getName()?>
         Logout</a>
        </li>
      </ul>
      <?php endif;?>
    </div>
  </div>
</nav>
<?php if(Application::$app->session->getFlash('success')): ?>
<div class="alert alert-success">
  <?php echo Application::$app->session->getFlash('success')?>
</div>
  <?php endif;?>
  {{content}}
</body>
</html>