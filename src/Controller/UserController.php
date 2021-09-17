<?php
class UserController extends Core\Controller
{
    public function addAction()
    {
        $this->render('register');
        echo "oui";
    }

    public function registerAction()
    {
        $model = new UserModel;
        $model->save($_POST);
    }
}
