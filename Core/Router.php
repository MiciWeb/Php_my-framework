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
        if (isset(self::$routes[$url])) {
            return self::$routes[$url];
        }
    }
}

class DynamicRouter
{
    public static function get($url)
    {
        $arr = explode("/", $url);
        array_shift($arr);
        $arr["controller"] = $arr[0];
        unset($arr[0]);
        $arr["action"] = $arr[1];
        unset($arr[1]);
        if (!isset($arr["controller"]) || $arr["controller"] == "") {
            $arr["controller"] = "app";
        }
        if (!isset($arr["action"]) || $arr["action"] == "") {
            $arr["action"] = "index";
        }
        // if(!isset($arr[1])){
        //     $action = "indexAction";
        // }else{
        //     $action = $arr[1]. "Action";
        // }
        // return $controller."/".$action;
        return $arr;
    }
}
