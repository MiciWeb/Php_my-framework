<?php

namespace Core;

class ORM extends Database
{
    public static function create($table, $fields)
    {
        self::dbConnect()->query("INSERT INTO $table (" . implode(", ", array_flip($fields)) . ") VALUES (\"" . implode("\", \"", array_values($fields)) . "\")");
        return self::dbConnect()->lastInsertId();
    }
    public static function read($table, $id)
    {
        $query = self::dbConnect()->query("SELECT * FROM $table WHERE id = $id");
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
        $query = self::dbConnect()->query("UPDATE $table SET 'rtrim($str_fields,", ")' WHERE id = $id");
        return $query;
    }
    public static function delete($table, $id)
    {
        $query = self::dbConnect()->query("DELETE FROM $table WHERE id = $id");
        return $query;
    }
    public static function find($table, $params)
    {
        $str_fields = "";
        foreach ($params as $key => $value) {
            if (!empty($value) && $key != "old_password") {
                $str_fields .= $key . " " . $value . " ";
            }
        }

        $query = self::dbConnect()->query("SELECT * FROM $table $str_fields ");
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
}
