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
        if ($Router->get($url) != null){
            print_r($Router->get($url));
        }else{
            $DynamicRouter = new DynamicRouter();
            $DynamicRouter->get($url);
            if(isset($controller)){
                print_r($controller);
            }
            echo "<br>";
            if(isset($action)){
                print_r($action);
            }
        }
        print_r($DynamicRouter->get($url));
        echo "</pre>";
        echo "<br> url: " . $url;
    }
}