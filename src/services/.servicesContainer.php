<?php 
use core\Container;
use core\Database;
use core\App;
use repositories\MangakaRepository;
use repositories\MangaRepository;
use services\MangakaService;
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

$container->setContainer(MangakaRepository::class, function () {
  $config = require __DIR__ .'/../config.php';
  $db = Database::getInstance($config['database']);
  return new MangakaRepository($db);
});

$container->setContainer(MangakaService::class, function () {
  return new MangakaService();
});


App::setContainer($container);

