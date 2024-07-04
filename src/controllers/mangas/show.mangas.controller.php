<?php

use core\App;
use services\MangasService;

$db = App::getServicesContainer()->getContainer(MangasService::class);
$manga = $db->selectById($_GET['id']);


$headerTitle = $manga['manga_name'];
require __DIR__ . '/../../views/mangas/show.mangas.view.php';
