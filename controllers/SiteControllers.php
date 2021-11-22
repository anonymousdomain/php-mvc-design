<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;

class SiteControllers extends Controller
{

    //get http verb
    public static function home()
    {
        $params = [
            'user' => 'Dawit Mekonnen'
        ];
        return $this->render('home',$params);
    }
    //get
    public static function showContact()
    {
        return Application::$app->router->renderView('contact');
    }

    //post
    public static function handleContact()
    {

        return "handle contact";
    }
}
