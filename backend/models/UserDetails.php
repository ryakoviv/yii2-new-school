<?php
namespace backend\models;

use yii\db\ActiveRecord;
use Yii;

class UserDetails extends ActiveRecord
{
    public $email;


    public static function tableName()
    {
        return 'user_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone', 'country', 'city'], 'safe'],
            [['first_name', 'last_name'], 'trim'],
            [['first_name', 'last_name'], 'required'],
            [['first_name', 'last_name'], 'string', 'min' => 2, 'max' => 255],

            [['phone'], 'string'],

            ['country', 'trim'],
            ['country', 'required'],
            ['country', 'string', 'max' => 80],

            ['city', 'trim'],
            ['city', 'required'],
            ['city', 'string', 'max' => 80],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'backend\models\User', 'message' => 'This email address has already been taken.', 'filter'=>['!=', 'email', Yii::$app->user->identity->email]],
        ];
    }


    public function updateDetails($data){
        $this->load($data);
        if ($this->validate()){
            $this->save();
            $user = User::findOne(Yii::$app->user->identity->id);
            $user->username = $this->email;
            $user->email = $this->email;
            $user->save();
        }
    }
}