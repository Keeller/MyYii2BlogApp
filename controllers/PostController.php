<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 12.06.2019
 * Time: 23:46
 */

namespace app\controllers;
require __DIR__.'/../'.'/vendor/autoload.php';

use yii\web\Controller;
use Faker;
use app\models\Post;


class PostController extends Controller
{
    public function actionIndex()
    {
        //$faker=Faker\Factory::create('ru_RU');
        $posts=Post::find()->all();
        return $this->render('index',compact('posts'));
    }

}