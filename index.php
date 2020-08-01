<?php
require_once 'Controllers/mainController.php';
/*router */
$route = $_GET['route'] ?? '';
$pattern = '~^blog/(.*)$~';
preg_match($pattern, $route, $matches);

if (!empty($matches)) {
    $controller = new MainController();
    $controller->routeBlog($matches[1]);
    return;
}

$pattern = '~^$~';
preg_match($pattern, $route, $matches);

if (!empty($matches)) {
    $controller = new MainController();
    $controller->main();
    return;
}

$pattern = '~(.*)~';
preg_match($pattern, $route, $matches);

if (!empty($matches)) {
    $controller = new MainController();
    $controller->routeBlog($matches[1]);
    return;
}
