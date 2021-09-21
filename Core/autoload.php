<?php
spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);

    if (file_exists($class . '.php')) {
        include $class . '.php';
    }
    if (file_exists('Core/' . $class . '.php')) {
        include 'Core/' . $class . '.php';
    }
    if (file_exists('src/' . $class . '.php')) {
        include 'src/' . $class . '.php';
    }
    if (file_exists('src/Controller/' . $class . '.php')) {
        include 'src/Controller/' . $class . '.php';
    }
    if (file_exists('src/Model/' . $class . '.php')) {
        include 'src/Model/' . $class . '.php';
    }
    if (file_exists('src/View/' . $class . '.php')) {
        include 'src/View/' . $className . '.php';
    }
});
