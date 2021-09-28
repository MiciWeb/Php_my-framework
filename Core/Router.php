<?php

namespace Core;

class Router
{
    private static $routes;
    public static function connect($url, $route)
    {
        self::$routes[$url] = $route;
    }
    public static function get($url)
    {
        // echo "<pre>";
        // $pop = explode("/",$url);
        // array_pop($pop);
        // print_r($pop);
        // print_r($url);
        // echo "</pre><br>";
        // echo $url;
        // echo "<br>";
        // echo implode("/",$pop);

        if (isset(self::$routes[$url])) {
            return self::$routes[$url];
        }
        else if(""){

        }
        else{
            echo "<h2>ERROR 404 - ROUTE NOT FOUND</h2>";
            return false;
        }
    }  
}

class DynamicRouter
{
    public static function get($url)
    {
        $arr = explode("/", $url);
        array_shift($arr);
        if (isset($arr[0])) {
            $arr["controller"] = $arr[0];
        } else {
            $arr["controller"] = "";
        }
        if (isset($arr[1])) {
            $arr["action"] = $arr[1];
        } else {
            $arr["action"] = "";
        }
        unset($arr[0]);
        unset($arr[1]);
        if (!isset($arr["controller"]) || $arr["controller"] == "") {
            $arr["controller"] = "app";
        }
        if (!isset($arr["action"]) || $arr["action"] == "") {
            $arr["action"] = "index";
        }
        
        return $arr;
    }
}
