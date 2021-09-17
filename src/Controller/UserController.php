<?php
class UserController extends Core\Controller
{
    public function addAction()
    {
        $this->render('register');
    }

    public function registerAction()
    {
        $model = new UserModel;
        $model->save($_POST);
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