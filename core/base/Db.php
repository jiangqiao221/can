<?php

namespace can\base;


class Db
{
    private static $_instance;

    private static $config = [
        'dsn' => 'mysql:host=localhost;dbname=can',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
    ];

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function connect($config = [])
    {
        if (!(self::$_instance instanceof self)) {
            $config = array_merge(self::$config, $config);

            $class = '\\can\\db\\drivers\\' . ucfirst(explode(':', $config['dsn'])[0]);
            self::$_instance = new $class($config);
        }

        return self::$_instance;
    }

    public static function __callStatic($method, $arguments)
    {
        return call_user_func([self::$_instance, $method], $arguments);
    }
}