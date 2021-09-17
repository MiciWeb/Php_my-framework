<?php
class Model
{
    private static $email, $password;
    private function save()
    {
        $bdd = new PDO("mysql:host=localhost;dbname=my_framework;charset=utf8", "root", "root");
        $stmt = $bdd->prepare("INSERT INTO users(`email`, `password`)VALUES (:email,:password)");
        $stmt->bindParam(":email", self::$email);
        $stmt->bindParam(":password", self::$password);
        $stmt->execute();

        return $stmt;
    }
}
