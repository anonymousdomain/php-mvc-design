<?php

namespace app\controllers;

use app\core\Application;

class SiteControllers
{

    public static function home()
    {
        $params = [
            'user' => 'Dawit Mekonnen'
        ];
        return Application::$app->router->renderView('home',$params);
    }
    public static function showContact()
    {
        return Application::$app->router->renderView('contact');
    }

    public static function handleContact()
    {

        return "handle contact";
    }
}
