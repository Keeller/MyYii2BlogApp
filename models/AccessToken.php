<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "access_token".
 *
 * @property int $id
 * @property string $token
 * @property string $time
 */
class AccessToken extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'access_token';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['token', 'time'], 'required'],
            [['time'], 'safe'],
            [['token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'token' => 'Token',
            'time' => 'Time',
        ];
    }
}
