<?php
namespace backend\common\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;
use yii\web\Response;

/**
 * Site controller
 *
 * @property \yii\db\ActiveRecord $activeRecord
 */
class MainController extends Controller
{
    protected $activeRecord = '';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => null,
                'rules' => [
                    [
                        'actions' => ['signup', 'login', 'request-password-reset', 'reset-password'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['hello', 'logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => isset(Yii::$app->user->identity->status_id),
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionDelete($id){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new $this->activeRecord;
        return ['status' => $model::deleteAll(['id'=>$id])];
    }
}
