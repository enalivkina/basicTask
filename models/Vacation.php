<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vacation".
 *
 * @property int $id
 * @property string $fio
 * @property string $date_begin
 * @property string|null $date_end
 * @property int|null $approve
 * @property string|null $date_create
 * @property string|null $date_update
 */
class Vacation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'date_begin'], 'required'],
            [['date_begin', 'date_end'], 'safe'],
            [['approve'], 'integer'],
            [['fio'], 'string', 'max' => 90],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fio' => 'ФИО',
            'date_begin' => 'Дата начала',
            'date_end' => 'Дата окончания',
            'approve' => 'Утв.',
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
