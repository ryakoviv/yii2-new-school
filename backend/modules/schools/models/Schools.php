<?php
namespace backend\modules\schools\models;

use yii\db\ActiveRecord;
use Yii;

class Schools extends ActiveRecord
{

    public static function tableName()
    {
        return 'school';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner_id', 'name', 'number', 'active', 'country', 'city', 'state', 'street'], 'safe'],

            [['owner_id', 'number'], 'integer'],

            ['active', 'integer'],
            ['active', 'default', 'value'=>1],

            [['phone'], 'string'],

            [['country', 'city', 'state', 'street'], 'trim'],
            [['country', 'city', 'state', 'street'], 'required'],
            [['country', 'city', 'state', 'street'], 'string', 'max' => 255],

            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => self::className(), 'message' => 'This email address has already been taken.'],
        ];
    }


}