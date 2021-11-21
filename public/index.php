<?php


$app=new Application();


$app->router->get('/',function(){
    return "hello world";
});


$app->run();