<?php

use core\App;
use services\MangasService;




// $manga = $db->query("SELECT * FROM mangas where Id_manga = :id", ['id' => $_GET['id']])->fetchOrFail();

$db = App::getServicesContainer()->getContainer(MangasService::class);
$manga = $db->selectById($_GET['id']);

var_dump($manga);

$headerTitle = $manga['manga_name'];
require __DIR__ . '/../../views/mangas/show.mangas.view.php';
