<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\ContactForm;

class SiteControllers extends Controller
{

    //get http verb
    public function home()
    {
        $params = [
            'user' => 'Dawit Mekonnen'
        ];
        return $this->render('home', $params);
    }
    //get
    public  function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());

            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'We Will Get Back To You Soon');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', [
            'model' => $contact
        ]);
    }

}
