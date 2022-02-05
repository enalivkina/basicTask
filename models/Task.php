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
 * @property string|null $date_create
 * @property string|null $date_update
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
            'date_create' => 'Дата создания',
            'date_update' => 'Дата изменения',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        if($insert){
            Yii::$app->session->setFlash('success', 'Запись успешно добавлена!');
        }
        else{
            Yii::$app->session->setFlash('success', 'Запись успешно обновлена!');
        }
        parent::afterSave($insert, $changedAttributes);
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            if($insert){
                $this->date_create = date('d.m.y H:i:s');
                $this->date_update = date('d.m.y H:i:s');
            }
            else{
                $this->date_update = date('d.m.y H:i:s');
            }
            return true;
        }
        else{
            return false;
        }

    }


}
