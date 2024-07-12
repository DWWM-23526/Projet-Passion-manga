<?php

use core\App;

session_start();

// AUTOLOAD CLASS

require __DIR__ . '/../vendor/autoload.php';

spl_autoload_register(function ($class){
    $result = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require __DIR__ . "/../src/{$result}.php";
});

// INIT

$router = App::init();
$router->route();
