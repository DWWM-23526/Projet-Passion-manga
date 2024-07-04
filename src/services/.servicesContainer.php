<?php 
use core\Container;
use core\Database;
use core\App;
use services\MangakasService;
use services\MangasService;
use services\TagsService;

$container = new Container();


$container->setContainer('services\MangasService', function () {
    $config = require __DIR__ . '/../config.php';
    $db = Database::getInstance($config['database']);
    return new MangasService($db);
});

$container->setContainer('services\MangakasService', function () {
    $config = require __DIR__ .'/../config.php';
    $db = Database::getInstance($config['database']);
    return new MangakasService($db);
});

$container->setContainer('services\TagsService', function () {
    $config = require __DIR__ .'/../config.php';
    $db = Database::getInstance($config['database']);
    return new TagsService($db);
});
App::setServicesContainer($container);

