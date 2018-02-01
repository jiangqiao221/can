<?php

namespace can;

use can\base\Bootstrap;
use can\base\Db;
use can\exceptions\UnknownPropertyException;

class Base
{
    private $_version = '1.0.0 dev';

    public static $app;

    /**
     * @var \can\db\Connection
     */
    public $db;

    public function __construct($config)
    {
        if (self::$app === null || !(self::$app instanceof self)) {
            self::$app = $this;
        }

        if (isset($config['db']) && !empty($config['db'])) {
            $this->db = Db::connect($config['db']);
        }
    }

    public function __get($name)
    {
        $getter = 'get' . ucfirst($name);
        if (method_exists($this, $getter)) {
            return $this->$getter();
        }

        throw new UnknownPropertyException('Getting unknown property: ' . get_class($this) . '::' . $name);
    }

    public function run()
    {
        Bootstrap::run();
    }

    public function getVersion()
    {
        return $this->_version;
    }
}