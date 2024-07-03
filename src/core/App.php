<?php

namespace core;

class App {

    protected static $servicesContainer;

    public static function setServicesContainer($container)
    {
        static::$servicesContainer = $container;
    }

    public static function getServicesContainer()
    {
        return static::$servicesContainer;
    }

}