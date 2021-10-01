<?php
Core\Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Core\Router::connect('/register', ['controller' => 'user', 'action' => 'add']);
Core\Router::connect('/login', ['controller' => 'user', 'action' => 'login']);
// Core\Router::connect('/user/{id}', ['controller' => "user", 'action' => 'show']);
Core\Router::connect('/show', ['controller' => "user", 'action' => 'show']);
Core\Router::connect('/delete', ['controller' => "user", 'action' => 'delete']);
Core\Router::connect('/movie', ['controller' => "movie", 'action' => 'show']);
Core\Router::connect('/movie/{id}', ['controller' => "movie", 'action' => 'show']);
Core\Router::connect('/movie/delete', ['controller' => "movie", 'action' => 'delete']);
Core\Router::connect('/movie/edit', ['controller' => "movie", 'action' => 'edit']);