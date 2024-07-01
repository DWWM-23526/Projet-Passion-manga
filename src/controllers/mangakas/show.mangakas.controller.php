<?php

require __DIR__ . "/../../core/Database.php";
$config = require __DIR__ . "/../../config.php";
$db = Database::getInstance($config['database']);

$mangaka = $db->query("SELECT * FROM mangakas where Id_mangaka = :id", ['id' => $_GET['id']])->fetchOrFail();

$headerTitle = 'LES MANGAKAS';
require __DIR__ . '/../../views/mangakas/show.mangakas.view.php';
