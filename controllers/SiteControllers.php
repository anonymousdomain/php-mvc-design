<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;

class SiteControllers extends Controller
{

    //get http verb
    public function home()
    {
        $params = [
            'user' => 'Dawit Mekonnen'
        ];
        return $this->render('home',$params);
    }
    //get
    public  function showContact()
    {
        return $this->router->render('contact');
    }

    //post
    public static function handleContact()
    {

        return "handle contact";
    }
}
