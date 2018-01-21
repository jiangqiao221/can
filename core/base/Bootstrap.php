<?php

namespace can\base;


class Bootstrap
{
    public static function run()
    {
        self::parseUrl();
    }

    private static function parseUrl()
    {
        $class = $action = 'Index';
        if (isset($_GET['r'])) {
            $info = explode('/', $_GET['r']);
            $class = ucfirst($info[0]);
            if (isset($info[1])) {
                $action = ucfirst($info[1]);
            }
        }

        $class = '\app\controllers\\' . $class . 'Controller';
        $action = 'action' . $action;
        echo (new $class)->$action();
    }
}