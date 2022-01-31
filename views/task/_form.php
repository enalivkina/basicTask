<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if (Yii::$app->user->can('co-worker') ) : ?>

        <?= $form->field($model, 'task')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <?php endif; ?>

    <?php if (Yii::$app->user->can('supervisor') ) : ?>

        <?= $form->field($model, 'task')->textInput(['maxlength' => true, 'disabled' => true]) ?>

        <?= $form->field($model, 'text')->textInput(['maxlength' => true, 'disabled' => true]) ?>

        <?= $form->field($model, 'exec')->dropDownList(['Не выполнено', 'Выполнено']) ?>

        <?= $form->field($model, 'mark')->dropDownList([0, 1, 2, 3, 4, 5]) ?>

    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
