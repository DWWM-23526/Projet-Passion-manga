<?php

require __DIR__ . '/../core/Database.php';
$config = require __DIR__ . '/../config.php';
$db = Database::getInstance($config['database']);

$mangas = $db->query("SELECT * FROM mangas")->fetchAll();

$titlePage = 'page index';



require __DIR__ . '/../views/index.view.php';
