<?php
namespace app\core;

use Request;

class Application
{

  public Router $router;
  Public Request $request;
  public function __construct()
  {
    $this->request=new Request();
    $this->router = new Router($this->request);
  }

  public function run(){
    
   echo  $this->router->resolve();
  }
}
