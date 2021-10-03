<?php
use Core\Router;

Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/register', ['controller' => 'user', 'action' => 'add']);
Router::connect('/login', ['controller' => 'user', 'action' => 'login']);
Router::connect('/show', ['controller' => "user", 'action' => 'show']);
Router::connect('/delete', ['controller' => "user", 'action' => 'delete']);
Router::connect('/movie', ['controller' => "movie", 'action' => 'show']);
Router::connect('/movie/{id}', ['controller' => "movie", 'action' => 'show']);
Router::connect('/movie/delete', ['controller' => "movie", 'action' => 'delete']);
Router::connect('/movie/edit', ['controller' => "movie", 'action' => 'edit']);
Router::connect('/movie/edit-gender', ['controller' => "gender", 'action' => 'edit']);
Router::connect('/movie/delete-gender', ['controller' => "gender", 'action' => 'delete']);