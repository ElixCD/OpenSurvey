<?php

class Container
{
    private static $collection = [];

    static function get($name)
    {
        return self::$collection[$name];
    }

    static function set($name, $value)
    {
        if (in_array($name, self::$collection)) {
            self::$collection[$name] = $value;
        }
    }
}
