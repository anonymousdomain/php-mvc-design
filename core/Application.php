<?php

namespace app\core;

use app\core\Request;
use app\core\Router;
use app\core\Response;

class Application
{
  public Router $router;
  public Request $request;
  public static $ROOT_DIR;
  public Response $response;
  public static $app;
  public Controller $controller;
  public function __construct($rootpath)
  {
    self::$app = $this;
    self::$ROOT_DIR = $rootpath;
    $this->request = new Request();
    $this->response = new Response();
    $this->router = new Router($this->request, $this->response);
  }

  public function run()
  {

    echo $this->router->resolve();
  }

  public function getController(){
    return $this->controller;
  }
  public function setController(Controller $controller)
  {
    $this->controller=$controller;

  }
}
