<?php

namespace Core;

class Request
{
    public function getQueryParams()
    {
        $arr = array_map(function($v){
            $v = trim($v);
            $v = htmlspecialchars($v);
            $v = stripslashes($v);
            return $v;
          }, $_REQUEST);
          return $arr;
    }
}
