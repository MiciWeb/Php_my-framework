<?php
class UserModel extends \Core\Entity
{
    private static $email, $password;

    public function save($arr)
    {
        // $ORM = new Core\ORM;
        $this->create("users", array("email" => $arr["email"], "password" => $arr["password"]));
    }
    public function checkLogin()
    {
        if (isset($_POST["email"])) {
            self::$email = $_POST["email"];
            self::$password = $_POST["password"];
        }

        // $stmt = $this->dbConnect()->prepare("SELECT * from users where email = :e");
        // $stmt->execute(array(':e' => self::$email));
        // $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

        // return $userRow;
    }
}
