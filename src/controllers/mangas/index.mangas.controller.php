<?php
use core\App;
use services\MangasService;

$headerTitle = 'LES MANGAS';


$db = App::getServicesContainer()->getContainer(MangasService::class);

$cardsTab = $db->selectAllMangas();


require __DIR__ . '/../../views/mangas/index.mangas.view.php';
