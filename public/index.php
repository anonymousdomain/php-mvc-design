<?php

use app\controllers\AuthControllers;
use app\controllers\SiteControllers;
use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'userClass'=>\app\models\RegisterModel::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];
$app = new Application(dirname(__DIR__), $config);

//$app->router->get('/', function () {return "hello world";});

//$app->router->get('/','Home');
//$app->router->get('/register','register');
//$app->router->get('/contact','contact');

//sitecontrollers
$app->router->get('/', [SiteControllers::class, 'home']);
$app->router->post('/contact', [SiteControllers::class, 'handleContact']);
$app->router->get('/contact', [SiteControllers::class, 'showContact']);

//authControllers
$app->router->get('/login', [AuthControllers::class, 'login']);
$app->router->post('/login', [AuthControllers::class, 'login']);
$app->router->get('/register', [AuthControllers::class, 'register']);
$app->router->post('/register', [AuthControllers::class, 'register']);
$app->router->get('/logout', [AuthControllers::class, 'logout']);

$app->run();
