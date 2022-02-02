<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vacation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_begin')->textInput(['type' => 'date'])?>

    <?= $form->field($model, 'date_end')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'approve')->dropDownList(['Не утверждено', 'Утверждено']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
