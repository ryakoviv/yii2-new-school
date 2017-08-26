<?php
namespace backend\modules\schools\controllers;

use backend\modules\schools\models\SchoolsSearch;
use backend\modules\schools\models\Schools;
use backend\common\controllers\MainController;
use Yii;

class SchoolsController extends MainController
{
    protected $activeRecord = '\backend\modules\school\models\School';

    public function actionIndex()
    {
        $searchModel = new SchoolsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index',[
            'searchModel'=> $searchModel,
            'dataProvider'=> $dataProvider
        ]);

    }

    public function actionView($id)
    {
        $model = Schools::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->save();
        }

        return $this->render('view',[
            'model'=> $model
        ]);
    }

    public function actionCreate()
    {
        $model = new Schools();
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()){
            $this->redirect('index');
        }

        return $this->render('create',[
            'model'=> $model
        ]);
    }


}