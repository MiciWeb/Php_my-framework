<?php

namespace Core;

class Entity
{
    public $table, $fields;
    public function __construct($fields = [])
    {
        foreach ($fields as $key => $value) {
            $this->$key = $value;
        }
        $this->fields = $fields;
    }
}
