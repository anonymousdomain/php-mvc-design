<?php

use app\controllers\AuthControllers;
use app\controllers\SiteControllers;
use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

//$app->router->get('/', function () {return "hello world";});

//$app->router->get('/','Home');
//$app->router->get('/register','register');
//$app->router->get('/contact','contact');

//sitecontrollers
$app->router->get('/',[SiteControllers::class,'home']);
$app->router->post('/contact',[SiteControllers::class,'handleContact']);
$app->router->get('/contact',[SiteControllers::class,'showContact']);

//authControllers
$app->router->get('/login',[AuthControllers::class,'login']);
$app->router->post('/login',[AuthControllers::class,'login']);
$app->router->get('/register',[AuthControllers::class,'register']);
$app->router->post('/register',[AuthControllers::class,'register']);



$app->run();
