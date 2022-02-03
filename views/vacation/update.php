<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vacation */

$this->title = 'Изменить отпуск: ' . $model->fio;
$this->params['breadcrumbs'][] = ['label' => 'Отпуска', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fio, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="vacation-update">

    <?php if (Yii::$app->user->can('updateTask', ['exec' => $model->approve]) ) : ?>

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    <?php elseif(Yii::$app->user->can('admin')):?>
        <h1><?= Html::encode('Для данного пользователя изменения запрещены!') ?></h1>
    <?php else:?>
        <h1><?= Html::encode('Отпуск '.$model->fio.' утвержден руководителем!') ?></h1>
    <?php endif; ?>

</div>
