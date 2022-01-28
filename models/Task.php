<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string|null $task
 * @property string|null $text
 * @property int|null $exec
 * @property int|null $mark
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['exec', 'mark'], 'integer'],
            [['task'], 'string', 'max' => 50],
            [['text'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'task' => 'Задание',
            'text' => 'Описание',
            'exec' => 'Выполнение',
            'mark' => 'Оценка',
        ];
    }
}
