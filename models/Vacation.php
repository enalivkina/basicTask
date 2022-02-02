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
        ];
    }
}
