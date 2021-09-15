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
        if ($Router->get($url) != null) {
            $arr = $Router->get($url);
            $this->callController($arr);
        } else {
            $DynamicRouter = new DynamicRouter();
            $arr = $DynamicRouter->get($url);
            $this->callController($arr);
        }
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
        // include 'src/Controller/AppController.php';

        $call = new $Controller;
        $call->$Action();
    }
}
