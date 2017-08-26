<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Create school';
$this->params['breadcrumbs'][] = ['label' => 'Schools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="site-signup">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Please fill out the following fields to create school:</p>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'create-school', 'options'=>['enctype'=>'multipart/form-data']]); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'number')->textInput(['type' => 'number']) ?>

                <?= $form->field($model, 'phone') ?>

                <?= $form->field($model, 'email')->input('email') ?>

                <?= $form->field($model, 'country') ?>

                <?= $form->field($model, 'state') ?>

                <?= $form->field($model, 'city') ?>

                <?= $form->field($model, 'street') ?>

                <div class="form-group">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-success', 'name' => 'create-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>