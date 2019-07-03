<?php

namespace app\models;

use Yii;
use app\models\ImageUpload;
use yii\base\InvalidArgumentException;
use yii\data\Pagination;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $date
 * @property string $image
 * @property int $viewed
 * @property int $user_id
 * @property int $status
 * @property int $category_id
 *
 * @property ArticleTag[] $articleTags
 * @property Comment[] $comments
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required' ],
            [['title','description', 'content'], 'string'],
            [['date'],'date','format'=>'php:Y-m-d'],
            [['date'],'default','value'=>date('Y-m-d')],
            [['title'],'string','max'=>255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'date' => 'Date',
            'image' => 'Image',
            'viewed' => 'Viewed',
            'user_id' => 'User ID',
            'status' => 'Status',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTags()
    {
        return $this->hasMany(ArticleTag::class, ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['article_id' => 'id']);
    }

    public function saveImage($filename)
    {

        $this->image=$filename;
        return $this->save(false);
    }

    public function delImage()
    {
        $model=new ImageUpload();;
        $model->deleteCurrentImage($this->image);

    }

    public function beforeDelete()
    {

        $this->delImage();
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public function getImage()
    {
        if($this->image)
        {
            //echo   __DIR__.'/../'.'web/'.'uploads/'.$this->image;die();
            return '/uploads/'.$this->image;
        }
        return '/no-image.png';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class,['id'=>'category_id']);
    }

    public function saveCategory($category_id)
    {
        $category=Category::findOne($category_id);
        if($category!=null) {
            $this->link('category', $category);
            return true;
        }
        return false;

    }

    public function getTags()
    {
        return $this->hasMany(Tag::class,['id'=>'tag_id'])->viaTable(ArticleTag::tableName(),['article_id'=>'id']);
    }

    public function saveTags($tags)
    {
        if(is_array($tags))
        {
            ArticleTag::deleteAll(['article_id'=>$this->id]);

            foreach ($tags as $tag_id)
            {
                $tag=Tag::findOne($tag_id);
                $this->link('tags',$tag);


            }

            return true;
        }
        else {
            throw new yii\base\InvalidArgumentException('Argument must be array');
            return false;


        }

    }

    public function getDate()
    {
        Yii::$app->formatter->locale = 'ru-RU';
        return Yii::$app->formatter->asDate($this->date);

    }

    public static function getPages(int $limit=1)
    {
        $query = Article::find();
        $pages = new Pagination(['totalCount' => $query->count(),'pageSize'=>$limit]);
        $articles = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return [
            'pages'=>$pages,
            'articles'=>$articles
        ];

    }

    public static function getPopular()
    {
        return Article::find()->orderBy('viewed desc')->limit(3)->all();

    }

    public static function getRecent()
    {
        return Article::find()->orderBy('date asc')->limit(4)->all();
    }





}
