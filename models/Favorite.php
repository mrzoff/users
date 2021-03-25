<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "favorite".
 *
 * @property int $id
 * @property int $user_id
 * @property int $favorite_user_id
 * @property int $created_at
 */
class Favorite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favorite';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'favorite_user_id'], 'required'],
            [['user_id', 'favorite_user_id', 'created_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'favorite_user_id' => 'Favorite User ID',
            'created_at' => 'Created At',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [

                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', false],

                    ActiveRecord::EVENT_BEFORE_UPDATE => false,

                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public static function isExist($user_id, $favorite_id)
    {
        if (static::find()->where(['user_id'=>$user_id, 'favorite_user_id'=>$favorite_id])->all()) {
            return true;
        }

        return false;
    }

    /*public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }*/

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'favorite_user_id']);
    }
}
