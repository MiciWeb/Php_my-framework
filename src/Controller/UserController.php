<?php

// use Core\Request;

class UserController extends Core\Controller
{
    public static $request;
    public function __construct()
    {
        // call the ./Core/Request class which secure all the form input 
        $params = new Core\Request;
        self::$request = $params->getQueryParams();
    }
    public function addAction()
    {
        $this->render('register');
    }
    public function registerAction()
    {
        // send secured register form input to the model
        $model = new UserModel;
        echo $model->save(self::$request);
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
