<?php
use kartik\detail\DetailView;




/* @var $this yii\web\View */
/* @var $details yii\db\ActiveRecord; */


$this->title = 'My account';


echo DetailView::widget([
    'model'=>$details,
    'condensed'=>true,
    'hover'=>true,
    'buttons1' => '{update}',
    'mode'=>DetailView::MODE_VIEW,
    'panel'=>[
        'heading'=>'Account Details',
        'type'=>DetailView::TYPE_INFO,
    ],
    'attributes'=>[
        'email',
        'first_name',
        'last_name',
        'phone',
        'country',
        'city'
    ]
]);