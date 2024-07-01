<?php


return [

    '/' =>  'controllers/index.controller.php',
    '/login' =>  'controllers/login.controller.php',

    '/mangas' => 'controllers/mangas/index.mangas.controller.php',
    '/mangas/manga' => 'controllers/mangas/show.mangas.controller.php',

    '/mangakas' => 'controllers/mangakas/index.mangakas.controller.php',
    '/mangakas/mangaka' => 'controllers/mangakas/show.mangakas.controller.php',

    '/genres' => 'controllers/tags/index.tags.controller.php'

];
