<?php

use yii\helpers\Html;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\VacationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отпуска';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->can('co-worker') ) : ?>
        <p>
            <?= Html::a('Создать отпуск', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fio',
            'date_begin',
            'date_end',
            [
                'attribute' => 'approve',
                'filter' => ['Не утверждено', 'Утверждено'],
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
            [
                'class' => ActionColumn::className(),
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
