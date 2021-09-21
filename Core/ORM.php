<?php

namespace Core;

class ORM extends Database
{
    public function create($table, $fields)
    {
        $this->dbConnect()->query("INSERT INTO $table (" . implode(", ", array_flip($fields)) . ") VALUES (\"" . implode("\", \"", array_values($fields)) . "\")");
        return Database::dbConnect()->lastInsertId();
    }
    public static function read($table, $id)
    {
        $query = Database::dbConnect()->query("SELECT * FROM $table WHERE id = $id");
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
    public static function update($table, $id, $fields)
    {
        $str_fields = "";
        foreach ($fields as $key => $value) {
            if (!empty($value) && $key != "old_password") {
                $str_fields .= $key . " = '" . $value . "', ";
            }
        }
        $query = Database::dbConnect()->query("UPDATE $table SET 'rtrim($str_fields,", ")' WHERE id = $id");
        return $query;
    }
    public static function delete($table, $id)
    {
        $query = Database::dbConnect()->query("DELETE FROM $table WHERE id = $id");
        return $query;
    }
    public static function find($table, $params = array( 'WHERE' => '1', 'ORDER BY' => 'id ASC', 'LIMIT' => ''))
    {
        $str_fields = "";
        foreach ($params as $key => $value) {
            if (!empty($value) && $key != "old_password") {
                $str_fields .= $key . " = '" . $value . "', ";
            }
        }
        $query = Database::dbConnect()->query("SELECT * from $table 'rtrim($str_fields,", ")'");
        return $query;
    }
}
