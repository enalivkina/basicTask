<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vacation}}`.
 */
class m220202_184542_create_vacation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vacation}}', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(90)->notNull(),
            'date_begin' => $this->date()->notNull(),
            'date_end' => $this->date(),
            'approve' => $this->smallInteger(1)->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%vacation}}');
    }
}
