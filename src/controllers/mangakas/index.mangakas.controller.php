<?php

use core\App;
use services\MangakasService;

$headerTitle = 'LES MANGAKAS';

$db = App::getServicesContainer()->getContainer(MangakasService::class);

$cardsTab = $db->selectAllMangakas();

require __DIR__ . '/../../views/mangakas/index.mangakas.view.php';
