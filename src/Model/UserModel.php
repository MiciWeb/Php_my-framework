<?php
class UserModel extends \Core\Entity
{
    private static $email, $password;

    public function save($request)
    {
        $this->create("users", array("email" => $request["email"], "password" => $request["password"]));
    }
    public function checkLogin($request)
    {
        if(isset($request["email"])){
            return $this->find("users", array('WHERE' => "email = '".$request["email"]."'"));
        }
    }
    public function deleteAccount($user,$id){
        echo "hello";
        // return $this->delete($user,$id); 
    }
}
