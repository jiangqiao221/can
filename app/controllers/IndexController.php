<?php

namespace app\controllers;

use Start;
use can\web\Controller;

class IndexController extends Controller
{
    public function actionIndex()
    {
        $db = Start::$app->db;
        $sql = "SHOW TABLE STATUS";
        $tables = $db->query($sql);
        $count = count($tables);
        return $this->render('index', ['tables' => $tables, 'count' => $count]);
    }
}