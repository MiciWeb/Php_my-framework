<?php
class UserModel extends \Core\Entity
{
    private static $email, $password;

    public function save($arr)
    {
        self::$email = $arr["email"];
        self::$password = $arr["password"];

        // $stmt = $this->dbConnect()->prepare("INSERT INTO users(`email`, `password`)VALUES (:email,:password)");
        // $stmt->bindParam(":email", self::$email);
        // $stmt->bindParam(":password", self::$password);
        // $stmt->execute();
        $ORM = new Core\ORM;
        $ORM->create("users",array("email" => self::$email, "password" => self::$password));
        // $stmt->execute();
        
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
