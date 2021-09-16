<?php
spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);

    if (file_exists($class . '.php')) {
        include $class . '.php';
    }
    if (file_exists('src/Controller/' . $class . '.php')) {
        include 'src/Controller/' . $class . '.php';
    }
});
