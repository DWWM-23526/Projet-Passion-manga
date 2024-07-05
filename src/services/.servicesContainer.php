<?php 
use core\Container;
use core\Database;
use core\App;
use repositories\MangaRepository;
use services\MangaService;

$container = new Container();



$container->setContainer(MangaRepository::class, function () {
    $config = require __DIR__ . '/../config.php';
    $db = Database::getInstance($config['database']);
    return new MangaRepository($db);
});

$container->setContainer(MangaService::class, function () {
  return new MangaService();
});


App::setContainer($container);

