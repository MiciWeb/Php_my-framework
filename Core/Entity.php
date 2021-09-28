<?php

namespace Core;

class Entity
{
    public function __construct($fields = [])
    {
        // foreach ($fields as $key => $value) {
        //     $this->$key = $value;
        // }
        // $this->fields = $fields;
    }

    public function create($table, $fields)
    {
        return ORM::create($table, $fields);
    }
    public function read($table, $email)
    {
        return ORM::read($table, $email);
    }
    public function update($table, $id, $fields)
    {
        return ORM::update($table, $id, $fields);
    }
    public function delete($table, $id)
    {
        return ORM::delete($table, $id);
    }
    public function find($table, $params)
    {
        return ORM::find($table, $params);
    }
}
