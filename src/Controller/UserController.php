<?php

// use Core\Request;
session_start();
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
    // public function showAction($id) {
    //     echo "ID de l'utilisateur a afficher : $id" . PHP_EOL;
    // }
    public function loginAction()
    {
        $this->render("login");
        $model = new UserModel;
        $infos = $model->checkLogin(self::$request);
        if (isset($infos["password"])) {
            if (self::$request["password"] === $infos["password"]) {
                $_SESSION["email"] = $infos["email"];
                $_SESSION["id"] = $infos["id"];
                $this->redirect("user");
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
    public function showAction()
    {
        $this->render("show", $_SESSION);
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        $this->redirect("login");
    }
    public function deleteAction()
    {
        if(isset($_SESSION["id"])){
            $model = new UserModel;
            $model->deleteAccount("users",$_SESSION["id"]);
            session_destroy();
            unset($_SESSION['user_session']);
            $message = "Account deleted !";
			$this->render("delete", ["message" => $message]);
        }
    }
}
