<?php

namespace core;

class App {

    protected static Container $container;

    public static function setContainer(Container $container)
    {
        static::$container = $container;
    }

    public static function inject()
    {
        return static::$container;
    }

}