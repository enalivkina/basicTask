<?php

use yii\db\Migration;

/**
 * Class m220203_190844_add_column_task
 */
class m220203_190844_add_column_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task', 'date_create', $this->dateTime());
        $this->addColumn('task', 'date_update', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('task', 'date_update');
        $this->dropColumn('task', 'date_create');
    }

}
