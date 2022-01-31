<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = 'Изменить задание: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Задание', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-update">

    <?php if (Yii::$app->user->can('updateTask', ['exec' => $model->exec]) ) : ?>

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    <?php elseif(Yii::$app->user->can('admin')):?>
        <h1><?= Html::encode('Для данного пользователя изменения запрещены!') ?></h1>
    <?php else:?>
        <h1><?= Html::encode('Задание '.$model->id.' отмечено руководителем как выполненное! Изменение запрещено!') ?></h1>
    <?php endif; ?>

</div>
