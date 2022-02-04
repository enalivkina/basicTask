<?php

use yii\helpers\Html;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Задания';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->can('co-worker') ) : ?>
        <p>
            <?= Html::a('Создать задание', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'task',
            'text',
            [
                    'attribute' => 'exec',
                    'format' => 'raw',
                    'value' => function($model){
                        return $model->exec ? '<span class="text-success" >Выполнено</span>' : '<span class="text-danger" >Не выполнено</span>';
                    } //как здесь) умеешь же
            ],
            'mark',
            'date_create',
            'date_update',
            [
                'class' => ActionColumn::className(),
                'visible' => function(){return true;}
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
