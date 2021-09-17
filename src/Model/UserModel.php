<?php
class UserModel
{
    private static $email, $password;
    public function save()
    {
        self::$email = $_POST["email"];
        self::$password = $_POST["password"];

        $bdd = new PDO("mysql:host=localhost;dbname=my_framework;charset=utf8", "root", "root");
        $stmt = $bdd->prepare("INSERT INTO users(`email`, `password`)VALUES (:email,:password)");
        $stmt->bindParam(":email", self::$email);
        $stmt->bindParam(":password", self::$password);
        $stmt->execute();

        echo self::$email;
        echo self::$password;

        return $stmt;
    }
}
