<?php

namespace core;

class App
{
    

    protected static Container $servicesContainer;
    protected static Container $repositoriesContainer;

    // CONTAINER

    public static function setContainer(Container $container)
    {
        static::$servicesContainer = $container;
    }

    public static function inject()
    {
        return static::$servicesContainer;
    }

    // SERVICES

    public static function setServiceContainer(Container $container)
    {
        static::$servicesContainer = $container;
    }

    public static function injectService()
    {
        return static::$servicesContainer;
    }

    // REPOSITORIES

    public static function setRepositoriesContainer(Container $container)
    {
        static::$servicesContainer = $container;
    }

    public static function injectRepositories()
    {
        return static::$servicesContainer;
    }

    // INITIALIZATION
}
