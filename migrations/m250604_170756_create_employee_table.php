<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 */
class m250604_170756_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if ($this->db->schema->getTableSchema('{{%employee}}', true) == null) {
            $this->createTable('{{%employee}}', [
                'id' => $this->primaryKey(),
                'first_name' => $this->string(50)->notNull(),
                'last_name' => $this->string(50)->notNull(),
                'email' => $this->string(100)->notNull()->unique(),
                'phone' => $this->string(20),
                'department' => $this->string(50)->notNull(),
                'position' => $this->string(50)->notNull(),
                'salary' => $this->decimal(10, 2),
                'hire_date' => $this->date()->notNull(),
                'status' => $this->tinyInteger(1)->notNull()->defaultValue(1)->comment('1=Active, 0=Inactive'),
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        if ($this->db->schema->getTableSchema('{{%employee}}', true) !== null) {
            $this->dropTable('{{%employee}}');
        }
    }
}
