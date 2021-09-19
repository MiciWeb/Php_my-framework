<?php
class Dbh
{
    private $servername = "localhost", $dbname = "my_framework";
    private $username = "root", $password = "root";


    protected function dbConnect()
    {
        $sql = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=utf8";
        try {
            $dbh = new PDO($sql, $this->username, $this->password);
        } catch (Exception $e) {
            echo "Erreur: " . $e->getMessage() . "<br>Ligne: " . $e->getLine();
            die();
        }
        return $dbh;
    }
}

class UserModel extends Dbh
{
    private static $email, $password;

    public function save()
    {
        self::$email = $_POST["email"];
        self::$password = $_POST["password"];

        // $bdd = new PDO("mysql:host=localhost;dbname=my_framework;charset=utf8", "root", "root");
        $stmt = $this->dbConnect()->prepare("INSERT INTO users(`email`, `password`)VALUES (:email,:password)");
        $stmt->bindParam(":email", self::$email);
        $stmt->bindParam(":password", self::$password);
        $stmt->execute();

        echo self::$email;
        echo self::$password;

        return $stmt;
    }
    public function checkLogin()
    {
        if (isset($_POST["email"])) {
            self::$email = $_POST["email"];
            self::$password = $_POST["password"];
        }

        $stmt = $this->dbConnect()->prepare("SELECT * from users where email = :e");
        $stmt->execute(array(':e' => self::$email));
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

        echo self::$email;
        echo self::$password;

        return $userRow;
    }
}
