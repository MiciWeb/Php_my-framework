<?php
namespace Core;

class Database{
    public $servername = "localhost", $dbname = "my_framework";
    public $username = "root", $password = "root";

    public function dbConnect()
    {
        $sql = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=utf8";
        try {
            $dbh = new \PDO($sql, $this->username, $this->password);
        } catch (\Exception $e) {
            echo "Erreur: " . $e->getMessage() . "<br>Ligne: " . $e->getLine();
            die();
        }
        return $dbh;
    }
}