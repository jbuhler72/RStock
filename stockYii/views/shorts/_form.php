<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Shorts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shorts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'stockSymbol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shortVolume')->textInput() ?>

    <?= $form->field($model, 'shortDate')->textInput() ?>

    <?= $form->field($model, 'shortTotalVolume')->textInput() ?>

    <?= $form->field($model, 'ShortExemptVolume')->textInput() ?>

    <?= $form->field($model, 'exchange')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shortPercent')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
