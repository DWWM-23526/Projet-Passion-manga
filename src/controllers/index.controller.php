<?php

require __DIR__ . '/../core/Database.php';

$headerTitle = 'BIENVENUE SUR PASSION MANGAS';


$config = require __DIR__ . '/../config.php';
$db = Database::getInstance($config['database']);
$mangas = $db->query("SELECT * FROM mangas")->fetchAll();




require __DIR__ . '/../views/index.view.php';
