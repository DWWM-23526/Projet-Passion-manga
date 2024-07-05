<?php

$router->get('/', 'controllers\IndexController', 'index');

$router->get('/login', 'controllers\LoginController', 'index');
$router->post('/login', 'controllers\LoginController', 'login');

$router->get('/register', 'controllers\LoginController', 'register');

$router->get('/mangas', 'controllers\MangasController', 'index');
$router->get('/mangas/manga', 'controllers\MangasController', 'show');

$router->get('/mangakas', 'controllers\MangakasController', 'index');
$router->get('/mangakas/mangaka', 'controllers\MangakasController', 'show');

$router->get('/genres', 'controllers\TagsController', 'index');
$router->get('/genres/genre', 'controllers\TagsController', 'show');

