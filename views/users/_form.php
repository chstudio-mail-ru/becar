<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(['enableAjaxValidation' => true]); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'status_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 500]) ?>

    <?= $form->field($model, 'sex')->checkbox() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'deleted')->checkbox() ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => 32]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
