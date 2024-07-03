<?php







// ROUTER 

require __DIR__ . '/../src/core/Router.php';

$router = new Router();
$route = require __DIR__ . '/../src/routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$uri = urldecode($uri);

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


$router->route($uri, $method);