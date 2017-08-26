<?php

use kartik\detail\DetailView;
use yii\helpers\Url;
use kartik\dialog\Dialog;

/* @var $this yii\web\View */
/* @var $model yii\db\ActiveRecord; */

$this->title = $model->name . ' Details';
$this->params['breadcrumbs'][] = ['label' => 'Schools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$ulrIndex = Url::to(['school/index'], true);
echo DetailView::widget([
    'model'=>$model,
    'condensed'=>true,
    'hover'=>true,
    'buttons1' => '{delete}{update}',
    'deleteOptions' => [
        'url' => 'delete?id=' . $model->id,
        'ajaxSettings' => [
            'success' => new \yii\web\JsExpression("function(data) {if (data.status){ window.location.href = '$ulrIndex' }}"),
        ],
    ],
    'mode'=>DetailView::MODE_VIEW,
    'panel'=>[
        'heading'=>$this->title,
        'type'=>DetailView::TYPE_INFO,
    ],
    'krajeeDialogSettings' => [
        'dialogDefaults'=> [
            Dialog::DIALOG_CONFIRM => [
                'type' => Dialog::TYPE_DANGER,
                'title' => 'Delete school',
                'btnOKClass' => 'btn-danger',
                'btnOKLabel' => 'Yes',
                'btnCancelLabel' => 'No'
            ]
        ]
    ],
    'attributes'=>[
        'name',
        'number',
        'active',
        'country',
        'state',
        'city',
        'street',
        'phone',
        'email',
    ]
]);