<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%favorite}}`.
 */
class m210325_083353_create_favorite_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('favorite', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'favorite_user_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%favorite}}');
    }
}
