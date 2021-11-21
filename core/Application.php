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
  public function __construct($rootpath)
  {
    self::$ROOT_DIR = $rootpath;
    $this->request = new Request();
    $this->response = new Response();
    $this->router = new Router($this->request, $this->response);
  }

  public function run()
  {

    echo $this->router->resolve();
  }
}
