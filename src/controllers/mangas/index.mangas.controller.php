<?php
use core\Database;
use core\App;
use services\MangasService;

$headerTitle = 'LES MANGAS';



// $config = require __DIR__ . '/../../config.php';
// $db = Database::getInstance($config['database']);

$db = App::getServicesContainer()->getContainer(MangasService::class);

$cardsTab = $db->selectAllMangas();

require __DIR__ . '/../../views/mangas/index.mangas.view.php';
