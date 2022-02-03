<?php

use yii\db\Migration;

/**
 * Class m220203_191225_add_column_vacation
 */
class m220203_191225_add_column_vacation extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('vacation', 'date_create', $this->dateTime());
        $this->addColumn('vacation', 'date_update', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('vacation', 'date_update');
        $this->dropColumn('vacation', 'date_create');
    }


}
