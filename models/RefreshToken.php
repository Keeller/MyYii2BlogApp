<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "refresh_token".
 *
 * @property int $id
 * @property string $token
 * @property string $time
 */
class RefreshToken extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'refresh_token';
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
