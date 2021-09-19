<?php

namespace Core;

class Request
{
    public function __construct()
    {
        echo "<pre>";
        foreach($_REQUEST as $value){
            trim($value);
            stripslashes($value);
            htmlspecialchars($value);
        }
        print_r($_REQUEST);
        echo "</pre>";
    }
}
