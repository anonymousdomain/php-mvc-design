<?php

namespace app\core;
class Router
{

    protected array $routes=[];
    public function get($path, $callback)
    {

       $this->routes['get'][$path]=$callback; 
    }
    public function post($path, $callback)
    {

       $this->routes['post'][$path]=$callback; 
    }

    public function resolve(){

       // echo "<pre>";
        //var_dump($_SERVER);
        //echo "</pre>";
        $path=$_SERVER['PATH_INFO']??'/';
        $method=strtolower($_SERVER['REQUEST_METHOD']);
        $callback=$this->routes[$method][$path];

        call_user_func($callback);
    }
}
