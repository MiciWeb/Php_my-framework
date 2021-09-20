<?php

use Core\Request;

class UserController extends Core\Controller
{
    public static $request;
    public function __construct()
    {
        // call the ./Core/Request class which secure all the form input 
        self::$request = new Core\Request;
    }
    public function addAction()
    {
        $this->render('register');
        print_r(self::$request);
        $model = new UserModel;
        $model->save(self::$request);
    }

    public function registerAction()
    {
        
    }
    public function loginAction()
    {
        $this->render("login");
        $model = new UserModel;
        if (count($_POST) > 1) {
            if ($model->checkLogin($_POST)) {
                echo "oui";
                $this->render("show");
            } else {
                echo "wrong email or pass";
            }
        }
    }
}
