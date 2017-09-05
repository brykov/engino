<?php

class Container
{
    private static $_container = [];

    public static function register($id, $instance)
    {
        self::$_container[$id] = $instance;
    }

    public static function get($id)
    {
        return self::$_container[$id];
    }

}