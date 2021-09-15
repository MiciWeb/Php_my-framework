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
        }else{
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
