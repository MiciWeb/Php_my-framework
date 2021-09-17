<?php
class UserController extends Core\Controller
{
    public function addAction()
    {
        $this->render('register',["lol","supprime"]);
    }

    public function registerAction()
    {
        echo "action";
    }
}
