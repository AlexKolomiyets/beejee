<?php
// Добавлять сообщения обо всех ошибках, кроме E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

// Точка входа
define('portal', TRUE);

$routes = array(
    array('uri' => '#^$#', 'view' => 'home'),
    array('uri' => '#^addtask$#', 'view' => 'addtask'),
    array('uri' => '#^task/(?P<id>[0-9]+)/?$#', 'view' => 'task'),
    array('uri' => '#^login$#', 'view' => 'login'),
    array('uri' => '#^logout$#', 'view' => 'logout'),
);

$uri = ltrim($_SERVER['REQUEST_URI'], '/');
$uri = explode('?', $uri)[0];

foreach($routes as $route){
    if(preg_match($route['uri'], $uri, $match)){
        $view = $route['view'];
        break;
    }
}

if(empty($match)){
    header("HTTP/1.1 404 Not Found");
    include 'views/404.php';
    exit;
}
extract($match);

include_once "controllers/{$view}_controller.php";