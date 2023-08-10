<?php

namespace Core;

class App
{
    protected static $container;

    public static function setContainer($container)
    {
        static::$container = $container;
    }

    public static function Container()
    {
        return static::$container;
    }
    public static function bind($key,$func)
    {
       return static::Container()->bind($key, $func);
    }
    public static function resolver($key)
    {
        return static::Container()->resolver($key);
    }
}

