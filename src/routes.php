<?php
Core\Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Core\Router::connect('/register', ['controller' => 'user', 'action' => 'add']);
Core\Router::connect('/login', ['controller' => 'user', 'action' => 'login']);
// Core\Router::connect('/user/{id}', ['controller' => "user", 'action' => 'show']);
Core\Router::connect('/user', ['controller' => "user", 'action' => 'show']);