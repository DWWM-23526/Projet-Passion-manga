<?php

namespace core;

use repositories\MangaRepository;
use services\MangaService;

class App
{
    protected static Container $container;
    protected static Container $servicesContainer;
    protected static Container $repositoriesContainer;

    // CONTAINER

    protected static function setContainer(Container $container)
    {
        static::$container = $container;
    }

    public static function inject()
    {
        return static::$container;
    }

    // SERVICES

    protected static function setServiceContainer(Container $container)
    {
        static::$servicesContainer = $container;
    }

    public static function injectService()
    {
        return static::$servicesContainer;
    }

    // REPOSITORIES

    protected static function setRepositoriesContainer(Container $container)
    {
        static::$repositoriesContainer = $container;
    }

    public static function injectRepository()
    {
        return static::$repositoriesContainer;
    }

    // INITIALIZATION

    public static function init()
    {
        // CONTAINER INIT

        $container = new Container();

        $container->setContainer(Database::class, function () {
            $config = require __DIR__ . '/../config.php';
            return Database::getInstance($config['database']);
        });

        App::setContainer($container);

        // REPOSITORIES CONTAINER INIT

        $containerRepositories = new Container();

        $containerRepositories->setContainer(MangaRepository::class, function () {
            return new MangaRepository();
        });

        App::setRepositoriesContainer($containerRepositories);

        // SERVICES CONTAINER INIT

        $containerServices = new Container();

        $containerServices->setContainer(MangaService::class, function () {
            return new MangaService();
        });

        App::setServiceContainer($containerServices);

        // ROUTER INIT

        $router = new Router();

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

        return $router;
    }
}