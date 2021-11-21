<?php
namespace app\core;
use app\core\Request;
use app\core\Router;
class Application
{
  public Router $router;
  Public Request $request;
  public static $ROOT_DIR;
  public function __construct($rootpath)
  {
    self::$ROOT_DIR=$rootpath;
    $this->request=new Request();
    $this->router = new Router($this->request);
  }

  public function run(){
    
   echo $this->router->resolve();
  }
  
}
