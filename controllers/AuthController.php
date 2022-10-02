<?php
namespace app\controllers;

use app\core\Controller;
use app\models\User;
use app\core\Request;
use app\core\Application;


class Authcontroller extends Controller
{
    public function register(Request $request)
    {
        $errors = [];
        $this->setLayout('auth');
  
        $user = new User();

        if ($request->isPost()) {
            $user->loadData($request->getBody());


            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                exit();
            }
           
            return $this->render('register', ['model' => $user]);
        }
        //это я закрыл
        //$this->setLayout('auth');
        return $this->render('register', ['model' => $user]);
    }
}