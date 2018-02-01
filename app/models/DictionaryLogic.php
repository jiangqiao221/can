<?php

namespace app\models;

use Start;

class DictionaryLogic
{
    public static function getFullFields($tableName)
    {
        $db = Start::$app->db;
        $sql = 'SHOW FULL FIELDS FROM `' . $tableName . '`';
        return $db->query($sql);
    }
}