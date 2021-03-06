<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\LoginModel;
use app\models\RegisterModel;
use app\core\middlewares\AuthMiddleware;
class AuthControllers extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $loginModel = new LoginModel();
        if ($request->isPost()) {
            $loginModel->loadData($request->getBody());
            if ($loginModel->validate() && $loginModel->login()) {
                $response->redirect('/');
                return ;
            }
        }
        $this->setLayout('auth');
        return $this->render('Login',[
            'model'=>$loginModel
        ]);
    }

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();

        if ($request->isPost()) {

            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->register()) {
                Application::$app->session->setFlash('success', 'you have registerd successfuly');
                Application::$app->response->redirect('/');
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

    public function logout(Request $req,Response $res){
        Application::$app->logout();
        $res->redirect('/');
    }

    public function profile(){

        return $this->render('profile');
    }
}
