<?php
namespace backend\modules\account\controllers;

use backend\common\controllers\MainController;
use Yii;
use backend\models\User;

class AccountController extends MainController
{
    public function actionIndex()
    {
        $model = Yii::$app->user->identity->details;
        if (Yii::$app->request->isPost){
            $model->updateDetails(Yii::$app->request->post());
        }

        return $this->render('details',[
            'details'=> $model
        ]);

    }
}