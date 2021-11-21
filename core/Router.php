<?php

namespace app\core;

use app\core\Request;

class Router
{
    public Request $request;
    protected array $routes = [];
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function get($path, $callback)
    {

        $this->routes['get'][$path] = $callback;
    }
    public function post($path, $callback)
    {

        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            return "page not found";
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        return call_user_func($callback);
    }

    public function renderView($view)
    {
        $layOutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);

        return str_replace('{{content}}',$layOutContent,$viewContent);
    }

    public function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR. "/../views/layouts/main.php";
        return ob_get_clean();
    }

    public function renderOnlyView($view)
    {
        ob_start();
        include_once Application::$ROOT_DIR. "/../views/$view.php";
        return ob_get_clean();
    }
}
