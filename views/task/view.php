<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = $model->task;
$this->params['breadcrumbs'][] = ['label' => 'Задания', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (Yii::$app->user->can('updateTask', ['exec' => $model->exec]) ) : ?>
        <p>
             <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                     'confirm' => 'Вы уверены что хотите удалить это задание?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif; ?>

    <?= DetailView::widget([
        'model' => $model,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'attributes' => [
            'task',
            'text',
            [
                'attribute' => 'exec',
                'format' => 'raw',
                'value' => function($model){
                    return $model->exec ? '<span class="text-success" >Выполнено</span>' : '<span class="text-danger" >Не выполнено</span>';
                }
            ],
            'mark',
            [
                'attribute' => 'date_create',
                'format' => ['DateTime', 'php:d.m.Y H:i:s']
            ],
            [
                'attribute' => 'date_update',
                'format' => ['DateTime', 'php:d.m.Y H:i:s']
            ],
        ],
    ]) ?>

</div>
