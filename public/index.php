<?php

use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

$app->router->get('/', function () {
    return "hello world";
});

$app->router->get('/','Home');
$app->router->get('/register','register');
$app->router->get('/contact','contact');



$app->run();
