<?php 
use core\Container;
use core\Database;
use core\App;
use services\MangasService;

$container = new Container();



$container->setContainer('services\MangasService', function () {
    $config = require __DIR__ . '/../config.php';
    $db = Database::getInstance($config['database']);
    return new MangasService($db);
});

App::setServicesContainer($container);
