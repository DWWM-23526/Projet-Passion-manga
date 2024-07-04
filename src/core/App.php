<?php

namespace core;

class App {

    protected static Container $servicesContainer;

    public static function setServicesContainer(Container $container)
    {
        static::$servicesContainer = $container;
    }

    public static function getServicesContainer()
    {
        return static::$servicesContainer;
    }

}