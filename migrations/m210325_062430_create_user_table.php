<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m210325_062430_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp()->notNull(),
        ]);
        Yii::$app->db->createCommand("
            INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `email`, `created_at`, `updated_at`) VALUES
            (2, 'mrzoff', 'u4qSt0cfaPdA8gBxi0ra4YkpyxK1yHI0', '$2y$13\$MGWgmSR93J2wnMy6WGNHvOv1KqEPJInDjYOKV7yLH9T45wi.MpNyq', 'mrzoff94@gmail.com', '2021-03-25 07:54:52', '2021-03-25 07:54:52'),
            (3, 'username_test_1', 'EW_bjqYDePw-YnNDjrgT7SMaq0Zj3Sm_', '$2y$13\$Fmvx3bVyw/1NyQdPBLOzrOIPEXlEsEkbpbmYgrOa/M4wS2lvKttFC', 'username_test_1@mail.ru', '2021-03-25 09:15:26', '2021-03-25 09:15:26'),
            (4, 'username_test_2', 'l6nT82NC4jNJqqYD4Jzo-eU5x5VfpoYm', '$2y$13\$lRd0myk1neQsJc2sGGpmPunjywlh45zjsr9CxI.zfZ1J40qAQKYD.', 'username_test_2@mail.ru', '2021-03-25 09:15:57', '2021-03-25 09:15:57'),
            (5, 'username_test_3', 'l6nT82NC4jNJqqYD4Jzo-eU5x5VfpoYm', '$2y$13\$lRd0myk1neQsJc2sGGpmPunjywlh45zjsr9CxI.zfZ1J40qAQKYD.', 'username_test_3@mail.ru', '2021-03-25 09:18:26', '2021-03-25 09:18:26'),
            (6, 'username_test_4', 'l6nT82NC4jNJqqYD4Jzo-eU5x5VfpoYm', '$2y$13\$lRd0myk1neQsJc2sGGpmPunjywlh45zjsr9CxI.zfZ1J40qAQKYD.', 'username_test_4@mail.ru', '2021-03-25 09:18:26', '2021-03-25 09:18:26'),
            (7, 'username_test_5', 'l6nT82NC4jNJqqYD4Jzo-eU5x5VfpoYm', '$2y$13\$lRd0myk1neQsJc2sGGpmPunjywlh45zjsr9CxI.zfZ1J40qAQKYD.', 'username_test_5@mail.ru', '2021-03-25 09:18:26', '2021-03-25 09:18:26'),
            (8, 'username_test_6', 'l6nT82NC4jNJqqYD4Jzo-eU5x5VfpoYm', '$2y$13\$lRd0myk1neQsJc2sGGpmPunjywlh45zjsr9CxI.zfZ1J40qAQKYD.', 'username_test_6@mail.ru', '2021-03-25 09:18:26', '2021-03-25 09:18:26'),
            (9, 'username_test_7', 'l6nT82NC4jNJqqYD4Jzo-eU5x5VfpoYm', '$2y$13\$lRd0myk1neQsJc2sGGpmPunjywlh45zjsr9CxI.zfZ1J40qAQKYD.', 'username_test_7@mail.ru', '2021-03-25 09:18:26', '2021-03-25 09:18:26'),
            (10, 'username_test_8', 'l6nT82NC4jNJqqYD4Jzo-eU5x5VfpoYm', '$2y$13\$lRd0myk1neQsJc2sGGpmPunjywlh45zjsr9CxI.zfZ1J40qAQKYD.', 'username_test_8@mail.ru', '2021-03-25 09:18:26', '2021-03-25 09:18:26'),
            (11, 'username_test_9', 'l6nT82NC4jNJqqYD4Jzo-eU5x5VfpoYm', '$2y$13\$lRd0myk1neQsJc2sGGpmPunjywlh45zjsr9CxI.zfZ1J40qAQKYD.', 'username_test_9@mail.ru', '2021-03-25 09:18:26', '2021-03-25 09:18:26'),
            (12, 'username_test_10', 'l6nT82NC4jNJqqYD4Jzo-eU5x5VfpoYm', '$2y$13\$lRd0myk1neQsJc2sGGpmPunjywlh45zjsr9CxI.zfZ1J40qAQKYD.', 'username_test_10@mail.ru', '2021-03-25 09:18:26', '2021-03-25 09:18:26'),
            (13, 'username_test_11', 'l6nT82NC4jNJqqYD4Jzo-eU5x5VfpoYm', '$2y$13\$lRd0myk1neQsJc2sGGpmPunjywlh45zjsr9CxI.zfZ1J40qAQKYD.', 'username_test_11@mail.ru', '2021-03-25 09:18:26', '2021-03-25 09:18:26'),
            (14, 'username_test_12', 'l6nT82NC4jNJqqYD4Jzo-eU5x5VfpoYm', '$2y$13\$lRd0myk1neQsJc2sGGpmPunjywlh45zjsr9CxI.zfZ1J40qAQKYD.', 'username_test_12@mail.ru', '2021-03-25 09:18:26', '2021-03-25 09:18:26'),
            (15, 'username_test_13', 'l6nT82NC4jNJqqYD4Jzo-eU5x5VfpoYm', '$2y$13\$lRd0myk1neQsJc2sGGpmPunjywlh45zjsr9CxI.zfZ1J40qAQKYD.', 'username_test_13@mail.ru', '2021-03-25 09:18:26', '2021-03-25 09:18:26'),
            (16, 'username_test_14', 'l6nT82NC4jNJqqYD4Jzo-eU5x5VfpoYm', '$2y$13\$lRd0myk1neQsJc2sGGpmPunjywlh45zjsr9CxI.zfZ1J40qAQKYD.', 'username_test_14@mail.ru', '2021-03-25 09:18:26', '2021-03-25 09:18:26'),
            (17, 'username_test_15', 'l6nT82NC4jNJqqYD4Jzo-eU5x5VfpoYm', '$2y$13\$lRd0myk1neQsJc2sGGpmPunjywlh45zjsr9CxI.zfZ1J40qAQKYD.', 'username_test_15@mail.ru', '2021-03-25 09:18:26', '2021-03-25 09:18:26'),
            (18, 'username_test_16', 'l6nT82NC4jNJqqYD4Jzo-eU5x5VfpoYm', '$2y$13\$lRd0myk1neQsJc2sGGpmPunjywlh45zjsr9CxI.zfZ1J40qAQKYD.', 'username_test_16@mail.ru', '2021-03-25 09:18:26', '2021-03-25 09:18:26');
        ")->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
