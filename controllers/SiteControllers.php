<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

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
        return $this->render('contact');
    }

    //post
    public function handleContact(Request $request)
    {

        $body=$request->getBody();
        var_dump($body);
        return "handle contact";
    }
}
