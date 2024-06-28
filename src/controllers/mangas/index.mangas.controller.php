<?php


$titlePage = 'Les mangas';

require __DIR__ . '/../../core/Database.php';
$config = require __DIR__ . '/../../config.php';
$db = Database::getInstance($config['database']);

$cardsTab = $db->query("SELECT * FROM mangas ")->fetchAll();

require __DIR__ . '/../../views/mangas/index.mangas.view.php';
