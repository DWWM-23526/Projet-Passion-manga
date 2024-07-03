<?php

use core\Router;
use core\Container;
use core\Database;
use core\App;

// AUTOLOAD CLASS

spl_autoload_register(function ($class){
    $result = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require __DIR__ . "/../src/{$result}.php";
});

// SERVICES CONTAINER

require __DIR__ . "/../src/services/.servicesContainer.php";

// $container = new Container();

// $container->setContainer('core\Database', function () {
//     $config = require __DIR__ . '/../src/config.php';
//     return Database::getInstance($config['database']);
// });

// App::setServicesContainer($container);


// ROUTER 



$router = new Router();
$route = require __DIR__ . '/../src/routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$uri = urldecode($uri);

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


$router->route($uri, $method);