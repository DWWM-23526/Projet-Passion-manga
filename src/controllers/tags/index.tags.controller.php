<?php


$headerTitle = 'LES GENRES';


require __DIR__ . '/../../core/Database.php';
$config = require __DIR__ . '/../../config.php';
$db = Database::getInstance($config['database']);

$cardsTab = $db->query("SELECT * FROM tags ")->fetchAll();
require __DIR__ . '/../../views/tags/index.tags.view.php';