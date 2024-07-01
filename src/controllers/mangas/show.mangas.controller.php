<?php





require __DIR__ . '/../../core/Database.php';
$config = require __DIR__ . '/../../config.php';
$db = Database::getInstance($config['database']);



$manga = $db->query("SELECT * FROM mangas where Id_manga = :id", ['id' => $_GET['id']])->fetchOrFail();


$headerTitle = 'LES MANGAS';
require __DIR__ . '/../../views/mangas/show.mangas.view.php';
