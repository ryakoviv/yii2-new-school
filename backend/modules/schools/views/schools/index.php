<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\dialog\Dialog;




/* @var $this yii\web\View */
/* @var $searchModel backend\modules\schools\models\SchoolsSearch; */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Schools';
$this->params['breadcrumbs'] = [$this->title];

echo '<div class="clearfix"></div>';
echo GridView::widget([
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => '\kartik\grid\CheckboxColumn'
        ],
        'name',
        'number',
        'active',
        'country',
        'state',
        'city',
        'street',
        'phone',
        'email',
        [
            'class' => '\kartik\grid\ActionColumn',
            'template' => '{view} {delete}',
        ]
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
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Schools</h3>',
        'type'=>'info',
        'footer'=>false,
    ],
    'panelHeadingTemplate' => '{heading}',
    'panelAfterTemplate'=> '{pager}{summary}',
    'toolbar'=> [
        'content' => Html::a('<i class="glyphicon glyphicon-plus"></i> Create School', ['create'], ['class' => 'btn btn-success btn-sm', 'data-pjax'=>0]),
    ],
    'pager' => [
        'options' => ['class'=> 'pagination', 'style' => 'margin : 0']
    ],
    'responsive'=>true,
    'hover'=>true,
    'bordered' => true,
    'pjax' => true
]);