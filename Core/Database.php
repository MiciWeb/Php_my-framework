<?php
namespace Core;

class Database{
    public static $servername = "localhost", $dbname = "my_framework",  $username = "root", $password = "root";

    public static function dbConnect()
    {
        $sql = "mysql:host=" . self::$servername . ";dbname=" . self::$dbname . ";charset=utf8";
        try {
            $dbh = new \PDO($sql, self::$username, self::$password);
        } catch (\Exception $e) {
            echo "Erreur: " . $e->getMessage() . "<br>Ligne: " . $e->getLine();
            die();
        }
        return $dbh;
    }
}