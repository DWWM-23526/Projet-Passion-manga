<?php

require __DIR__ . '/../core/Database.php';
$config = require __DIR__ . '/../config.php';
$db = Database::getInstance($config['database']);

$mangas = $db->query("SELECT * FROM mangas ")->fetchAll();

var_dump($mangas);

$titlePage = 'coucouc from index';



require __DIR__ . '/../views/index.view.php';
