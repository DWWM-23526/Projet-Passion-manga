<?php
use core\Database;

$headerTitle = 'LES MANGAKAS';


$config = require __DIR__ . '/../../config.php';
$db = Database::getInstance($config['database']);

$cardsTab = $db->query("SELECT * FROM mangakas")->fetchAll();

require __DIR__ . '/../../views/mangakas/index.mangakas.view.php';
