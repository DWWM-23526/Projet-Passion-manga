<?php
use core\App;
use services\MangakasService;


$db = App::getServicesContainer()->getContainer(MangakasService::class);

$mangaka = $db->selectById($_GET['id']);

$headerTitle = $mangaka['first_name'] . " " . $mangaka['last_name'];
require __DIR__ . '/../../views/mangakas/show.mangakas.view.php';
