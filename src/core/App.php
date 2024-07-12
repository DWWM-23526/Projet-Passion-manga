<?php

namespace core;

use repositories\FavoriesRepository;
use repositories\MangakaRepository;
use repositories\MangaRepository;
use repositories\TagsRepository;
use repositories\UserRepository;
use services\AuthService;
use services\FavoriesService;
use services\JwtService;
use services\MangakaService;
use services\MangaService;
use services\TagsService;
use services\UserService;

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

        $containerRepositories->setContainer(MangakaRepository::class, function () {
            return new MangakaRepository();
        });

        $containerRepositories->setContainer(TagsRepository::class, function () {
            return new TagsRepository();
        });

        $containerRepositories->setContainer(UserRepository::class, function () {
            return new UserRepository();
        });

        $containerRepositories->setContainer(FavoriesRepository::class, function () {
            return new FavoriesRepository();
        });

        App::setRepositoriesContainer($containerRepositories);

        // SERVICES CONTAINER INIT

        $containerServices = new Container();

        $containerServices->setContainer(MangaService::class, function () {
            return new MangaService();
        });

        $containerServices->setContainer(MangakaService::class, function () {
            return new MangakaService();
        });

        $containerServices->setContainer(TagsService::class, function () {
            return new TagsService();
        });

        $containerServices->setContainer(AuthService::class, function () {
            return new AuthService();
        });

        $containerServices->setContainer(JwtService::class, function () {
            return new JwtService();
        });

        $containerServices->setContainer(UserService::class, function () {
            return new UserService();
        });

        $containerServices->setContainer(FavoriesService::class, function () {
            return new FavoriesService();
        });

        App::setServiceContainer($containerServices);

        // ROUTER INIT

        $router = new Router();

        $router->get('/', 'controllers\IndexController', 'index');
        $router->get('/logout', 'controllers\AuthController', 'logout');

        $router->get('/login', 'controllers\AuthController', 'indexLogin')->middleware('guest');
        $router->post('/login', 'controllers\AuthController', 'login')->middleware('guest');
        $router->get('/managment', 'controllers\AuthController', 'managment')->middleware('auth');

        $router->get('/register', 'controllers\AuthController', 'indexRegister')->middleware('guest');
        $router->post('/register', 'controllers\AuthController', 'register')->middleware('guest');

        $router->get('/mangas', 'controllers\MangasController', 'index');
        $router->post('/mangas', 'controllers\MangasController', 'post');
        $router->get('/mangas/manga', 'controllers\MangasController', 'show');

        $router->get('/mangakas', 'controllers\MangakasController', 'index');
        $router->post('/mangakas', 'controllers\MangakasController', 'post');
        $router->get('/mangakas/mangaka', 'controllers\MangakasController', 'show');

        $router->get('/genres', 'controllers\TagsController', 'index');
        $router->get('/genres/genre', 'controllers\TagsController', 'show');

        $router->get('/favories/user', 'controllers\FavoriesController', 'index')->middleware('auth');

        return $router;
    }
}
