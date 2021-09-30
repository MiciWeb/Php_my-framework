<?php

namespace Core;

class Core
{
    public function run()
    {
        include_once("./src/routes.php");
        $url = $_SERVER['REQUEST_URI'];
        $Router = new Router();
        $pop = explode("/", $url);
        if (ctype_digit(end($pop))){
            array_pop($pop);
        }
        $urlParam = implode("/",$pop);
        if ($Router->get($urlParam) != null) {
            $arr = $Router->get($urlParam);
            $this->callController($arr);
        }
        // ! // If you want to use the dynamic router just uncomment this and comment the basic router above
        // $DynamicRouter = new DynamicRouter();
        // if ($DynamicRouter->get($url) != null) {
        //     $arr = $DynamicRouter->get($url);
        //     $this->callController($arr);
        // }
    }
    public function callController($arr)
    {
        $Controller = ucfirst($arr["controller"]) . "Controller";
        $Action = $arr["action"] . "Action";
        $arr = [$Controller, $Action];

        if (!in_array($Controller . ".php", scandir("./src/Controller"))) {
            echo "<h2>404 ERROR - CONTROLLER NOT FOUND</h2>";
            echo "<h4> The '" . $Controller . "' controller doesn't exist.</h4>";
        }
        $call = new $Controller;
        if (!method_exists($call, $Action)) {
            echo "<h2>404 ERROR - METHOD NOT FOUND</h2>";
            echo "<h4> The '" . $Action . "()' method doesn't exist in the Class '" . $Controller . "'.</h4>";
        }
        $call->$Action();
    }
}
