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
        if (isset($request)) {
            $model = new UserModel;
            $infos = $model->checkLogin($request);
            if (isset($infos[0]["password"])) {
                if ($request["password"] === $infos[0]["password"]) {
                    $_SESSION["email"] = $infos[0]["email"];
                    $_SESSION["id"] = $infos[0]["id"];
                    $this->redirect("show");
                } else {
                    echo "<p>Password incorrect</p>";
                }
            }
        }
    }
    
    public function showAction()
    {
        $params = new Core\Request;
        $request = $params->getQueryParams();
        $model = new UserModel;
        $infos = $model->checkLogin($request);
        // update email
        if (isset($request["email"])) {
            $model = new UserModel;
            $model->update("users", $_SESSION["id"], ["email" => $request["email"]]);
            if (isset($infos[0]["email"])) {
                $_SESSION["email"] = $infos[0]["email"];
            }
        }
        // update pass
        if (isset($request["password"])) {
            $model = new UserModel;
            $model->update("users", $_SESSION["id"], ["password" => $request["password"]]);
        }

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
