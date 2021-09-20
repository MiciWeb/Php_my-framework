<?php

namespace Core;

class Request
{
    public function __construct()
    {
        $arr = array_map(function($v){
            $v = trim($v);
            $v = htmlspecialchars($v);
            $v = stripslashes($v);
            $v = ucfirst($v);
            print_r($v);
            return $v;
          }, $_REQUEST);
          return $arr;
    }
}
