<?php

use yii\db\Migration;

/**
 * Class m210519_133321_add_admin_user
 */
class m210519_133321_add_admin_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert("{{%user}}", [
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email',
            'status',
            'created_at',
            'updated_at',
        ], [
            [
                'admin',
                Yii::$app->security->generateRandomString(),
                Yii::$app->security->generatePasswordHash('123456'),
                '',
                'admin@example.com',
                10,
                time(),
                time()
            ]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete("{{%table}}", ['username' => 'admin']);
    }
}
