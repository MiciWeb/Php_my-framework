<?php

namespace Core;

class Router
{
    private static $routes;
    public static function connect($url, $route)
    {
        self::$routes[$url] = $route;
        // echo "<pre>";
        // //print_r(self::$routes);
        // echo __DIR__;
        // echo "<br>";
        // echo "<br>";
        // echo "</pre>";
        // // echo "url:" . $url . "<br>";
        // // print_r($route);
    }
    public static function get($url)
    {
        if (isset(self::$routes[$url])) {
            return self::$routes[$url];
        }
    }
}
