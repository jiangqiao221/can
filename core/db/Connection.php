<?php

namespace can\db;

use PDO;

abstract class Connection
{
    protected $pdo;

    public function __construct($config)
    {
        $this->pdo = new PDO($config['dsn'], $config['username'], $config['password']);
        $this->pdo->exec('SET NAMES ' . $config['charset'] . ';');
        return $this->pdo;
    }

    public function query($sql)
    {
        $obj = $this->pdo->query($sql);
        if ($obj) {
            return $obj->fetchAll(PDO::FETCH_ASSOC);
        }

        return [];
    }

    public function execute($sql)
    {
        return $this->pdo->exec($sql);
    }

    abstract public function getTables($dbName = '');

    abstract public function getFields($tableName);
}