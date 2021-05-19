<?php

use yii\db\Migration;

/**
 * Class m210519_135056_create_table_questioning
 */
class m210519_135056_create_table_questioning extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("{{%questioning}}", [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'phone' => $this->string(50)->notNull(),
            'region' => $this->string(255)->notNull(),
            'city' => $this->string(255)->notNull(),
            'sex' => $this->integer(11)->notNull(),
            'rating' => $this->integer(2)->notNull(),
            'comment' => $this->text()->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("{{%questioning}}");
    }
}
