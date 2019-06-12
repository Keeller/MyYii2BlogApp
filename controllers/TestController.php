<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 12.06.2019
 * Time: 22:00
 */

namespace app\controllers;

use yii\web\Controller;

class TestController extends Controller
{

    public function actionIndex()
    {
        echo __METHOD__;
    }

    public function actionPage()
    {
        echo __METHOD__;
    }
}