<?php

$router->get('/', 'controllers/index.controller.php');

$router->get('/login', 'controllers/login/login.controller.php');
$router->post('/login', 'controllers/login/login.controller.php');

$router->get('/register', 'controllers/login/register.controller.php');

$router->get('/mangas', 'controllers/mangas/index.mangas.controller.php');
$router->get('/mangas/manga', 'controllers/mangas/show.mangas.controller.php');

$router->get('/mangakas', 'controllers/mangakas/index.mangakas.controller.php');
$router->get('/mangakas/mangaka', 'controllers/mangakas/show.mangakas.controller.php');

$router->get('/genres', 'controllers/tags/index.tags.controller.php');
