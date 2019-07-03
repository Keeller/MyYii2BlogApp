<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 30.06.2019
 * Time: 21:27
 */

namespace app\controllers;


use app\models\Article;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\web\Response;

class ArticleController extends ActiveController
{
    public $modelClass='app\models\Article';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_HTML;
        return $behaviors;
    }

    public function actionFoo($id)
    {

        $article=Article::findOne($id);
        $tags=ArrayHelper::getColumn($article->tags,'title');

        return $this->renderAjax('single',[
            'article'=>$article,
            'tags'=>$tags
        ]);
    }

    public function actionMain()
    {
        $query = Article::getPages();

        return $this->renderAjax('index',[
            'articles'=>$query['articles'],
            'pages'=>$query['pages'],
        ]);

    }

}