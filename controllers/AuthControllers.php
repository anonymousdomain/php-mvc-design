<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

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
        $registerModel = new RegisterModel();

        if ($request->isPost()) {

            $registerModel->loadData($request->getBody());
           
            if ($registerModel->validate() && $registerModel->register()) {
                return "successfully saved";
            }
           
            $this->setLayout('auth');
            return $this->render('register', [
                'model' => $registerModel
            ]);
        }

        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }
}