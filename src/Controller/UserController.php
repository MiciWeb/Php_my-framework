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
        $model->save(self::$request);
    }
    public function loginAction()
    {
        $this->render("login");
        $model = new UserModel;
        $infos = $model->checkLogin(self::$request);
        if(isset($infos["password"])){
            if (self::$request["password"] === $infos["password"]) {
                $this->redirect("user/".$infos["id"]);
            //    $this->render("show",$infos);
            } else {
                echo "<p>Password incorrect</p>";
            }
        }
        // if (count(self::$request) > 1) {
        //     if ($model->checkLogin(self::$request)) {
        //         echo "oui";
        //         $this->render("show");
        //     } else {
        //         echo "wrong email or pass";
        //     }
        // }
    }
}
