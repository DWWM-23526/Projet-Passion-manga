<?php

use core\Router;

// AUTOLOAD CLASS

spl_autoload_register(function ($class){
    $result = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require __DIR__ . "/../src/{$result}.php";
});

// SERVICES CONTAINER

require __DIR__ . "/../src/services/.servicesContainer.php";


// ROUTER 



$router = new Router();
$route = require __DIR__ . '/../src/routes.php';
$router->route();