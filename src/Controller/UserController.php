<?php
class UserController extends Core\Controller
{
    public function addAction()
    {
        $this->render('register');
    }

    public function registerAction()
    {
        echo "action";
    }
}
