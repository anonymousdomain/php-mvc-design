<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class AuthControllers extends Controller
{

    public function login(Request $request)
    {
        if ($request->isGet())
        $this->setLayout('auth');
            return $this->render('Login');
    }

    public function register(Request $request)
    {

        if ($request->isGet()) {
            $this->setLayout('auth');
            return  $this->render('Register');
        }
        if ($request->isPost())
           return ;
    }
}
