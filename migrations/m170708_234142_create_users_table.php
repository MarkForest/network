<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m170708_234142_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'firstname'=>$this->string(25)->notNull(),
            'lastname'=>$this->string(25)->notNull(),
            'password'=>$this->string()->notNull(),
            'email'=>$this->string()->notNull(),
            'dateofbirth'=>$this->date()->notNull(),
            'gender'=>$this->integer()->notNull(),
            'city'=>$this->string(25)->notNull(),
            'country'=>$this->string(25)->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
