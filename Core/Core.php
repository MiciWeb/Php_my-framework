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
        echo "<pre>";
        print_r($Router->get($url));
        echo "</pre>";
        echo "<br> url: " . $url;
    }
}
