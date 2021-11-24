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
  public Database $db;
  public Session $session;
  public DbModel $user;
  public string $userClass;
  public function __construct($rootpath,array $config)
  {
    $this->userClass=$config['userClass'];
    self::$app = $this;
    self::$ROOT_DIR = $rootpath;
    $this->request = new Request();
    $this->response = new Response();
    $this->router = new Router($this->request, $this->response);
    $this->db=new Database($config['db']);
    $this->session=new Session();
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

  public function login(DbModel $user){
    $this->user=$user;
    $primaryKey=$user->primaryKey();
    $primaryValue=$user->{$primaryKey};
    //set session
    $this->session->set('user',$primaryValue);
  }
}
