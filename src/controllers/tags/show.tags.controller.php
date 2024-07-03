<?php
use core\Database;


$config = require __DIR__ . '/../../config.php';
$db = Database::getInstance($config['database']);

$tags = $db->query('SELECT mangas.* , tags.tag_name  FROM mangas 
    JOIN tags_manga on tags_manga.Id_manga = mangas.Id_manga
    JOIN tags on tags.Id_tag = tags_manga.Id_tag
    WHERE tags.Id_tag = :id', ['id' => $_GET['id']])->fetchAll();

$tagName = $db->query('SELECT tag_name FROM tags where Id_tag = :id', ['id' => $_GET['id']])->fetchOrFail();
$headerTitle = $tagName['tag_name'];
require __DIR__ . '/../../views/tags/show.tags.view.php';
