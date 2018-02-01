<?php

namespace can\db\drivers;

use can\db\Connection;

class Mysql extends Connection
{
    public function getTables($dbName = '')
    {
        $sql = !empty($dbName) ? 'SHOW TABLES FROM ' . $dbName : 'SHOW TABLES';
        $result = $this->query($sql);
        $info = [];
        foreach ($result as $k => $v) {
            $info[$k] = current($v);
        }
        return $info;
    }

    public function getFields($tableName)
    {
        $sql = 'SHOW COLUMNS FROM `' . $tableName . '`';
        $result = $this->query($sql);
        $info = [];
        foreach ($result as $k => $v) {
            $info[$k] = $v;
        }
        return $info;
    }
}