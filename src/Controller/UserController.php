<?php

// use Core\Request;
session_start();
class UserController extends Core\Controller
{
    public static $request;

    public function addAction()
    {
        // send secured register form input to the model
        $this->render('register');
        $params = new Core\Request;
        $request = $params->getQueryParams();

        if (isset($request) && $request != null) {
            $message = "Account created !";
            $this->render('register', ["message" => $message]);
            $model = new UserModel;
            $model->save($request);
        }
    }

    public function loginAction()
    {
        $this->render("login");
        $params = new Core\Request;
        $request = $params->getQueryParams();
        if (isset($request) && $request != null) {
            $model = new UserModel;
            $infos = $model->checkLogin($request);
            if (isset($infos["password"])) {
                if ($request["password"] === $infos["password"]) {
                    $_SESSION["email"] = $infos["email"];
                    $_SESSION["id"] = $infos["id"];
                    $this->redirect("user");
                } else {
                    echo "<p>Password incorrect</p>";
                }
            }
        }
    }
    public function showAction()
    {
        $this->render("show", $_SESSION);
    }

    public function deleteAction()
    {
        if (isset($_SESSION["id"])) {
            $model = new UserModel;
            $model->deleteAccount("users", $_SESSION["id"]);
            session_destroy();
            unset($_SESSION['user_session']);
            $message = "Account deleted !";
            $this->render("delete", ["message" => $message]);
        }
    }
}
