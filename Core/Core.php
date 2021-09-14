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
            $this->transformRouterName($arr);
        } else {
            $DynamicRouter = new DynamicRouter();
            $DynamicRouter->get($url);
            $this->transformRouterName($arr);
        }
        echo "</pre>";
        echo "<br> url: " . $url;
    }
    public function transformRouterName($arr)
    {
        $controller = ucfirst($arr["controller"]) . "Controller";
        $action = $arr["action"] . "Action";
        $arr = [$controller, $action];
        $Controller = "new $controller" . "()";
        $Action = "->" . $action . "()";
        echo "<br>";
        echo $Controller;
        echo "<br>";
        echo $Action;
    }
}
