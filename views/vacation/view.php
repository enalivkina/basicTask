<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vacation */

$this->title = $model->fio;
$this->params['breadcrumbs'][] = ['label' => 'Отпуска', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vacation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->can('updateTask', ['exec' => $model->approve]) ) : ?>

        <p>
            <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif; ?>

    <?= DetailView::widget([
        'model' => $model,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'attributes' => [
            'fio',
            'date_begin',
            'date_end',
            [
                'attribute' => 'approve',
                'format' => 'raw',
                'value' => function($model){
                    return $model->approve ? '<span class="text-success" >Утвержден</span>' : '<span class="text-danger" >Не утвержден</span>';
                }
            ],
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
