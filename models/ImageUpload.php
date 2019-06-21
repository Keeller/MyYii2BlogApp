<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 20.06.2019
 * Time: 20:36
 */

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;


class ImageUpload extends Model
{

    public $image;

    public function rules()
    {
        return [
            [['image'],'required'],
            [['image'],'file','extensions'=>'jpg,png']
        ];
    }

    public function uploadFile(UploadedFile $file,$CurrentImage)
    {
        $this->image=$file;
        if($this->validate())
        {
            $this->deleteCurrentImage($CurrentImage);
            $filename = strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension);
            //echo $filename; die();
            $file->saveAs($this->getFolder(). $filename);
            return $filename;
        }

    }

    private function getFolder()
    {
        return \Yii::getAlias('@web') . 'uploads/';

    }

    public function deleteCurrentImage($CurrentImage)
    { //echo \Yii::getAlias('@web') . 'uploads/'. $CurrentImage;die();
        if(is_file(\Yii::getAlias('@web') . 'uploads/'. $CurrentImage)) {

            if (file_exists(\Yii::getAlias('@web') . 'uploads/' . $CurrentImage)) {
                unlink(\Yii::getAlias('@web') . 'uploads/' . $CurrentImage);
            }
        }
    }
}