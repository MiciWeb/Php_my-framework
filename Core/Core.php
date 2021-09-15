<?php

namespace Core;

class Core
{
    public function run()
    {
        echo __CLASS__ . " [OK]" . PHP_EOL;
        include_once("./src/routes.php");
        $url = $_SERVER['REQUEST_URI'];
        $Router = new Router();
        $DynamicRouter = new DynamicRouter();
        if ($Router->get($url) != null) {
            $arr = $Router->get($url);
            $this->callController($arr);
        } 
        elseif($DynamicRouter->get($url) != null) {
            $arr = $DynamicRouter->get($url);
            $this->callController($arr);
        }
        echo $url;
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
        // TODO: 
        // else {
        //     echo "ERROR 404 - ROUTE NOT FOUND";
        // }
    }
    public function callController($arr)
    {
        $controller = ucfirst($arr["controller"]) . "Controller";
        $action = $arr["action"] . "Action";
        $arr = [$controller, $action];
        $Controller = $controller;
        $Action = $action;

        $call = new $Controller;
        $call->$Action();
    }
}
