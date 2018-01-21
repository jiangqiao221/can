<?php

namespace app\controllers;

use Start;
use can\web\Controller;

class IndexController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', ['version' => Start::$app->version]);
    }
}