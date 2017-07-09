<?php

use yii\db\Migration;

/**
 * Handles the creation of table `myprofile`.
 * Has foreign keys to the tables:
 *
 * - `users`
 */
class m170709_000754_create_myprofile_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('myprofile', [
            'id' => $this->primaryKey(),
            'personal_info'=>$this->text(),
            'job_title'=>$this->string(),
            'user_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-myprofile-user_id',
            'myprofile',
            'user_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-myprofile-user_id',
            'myprofile',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `users`
        $this->dropForeignKey(
            'fk-myprofile-user_id',
            'myprofile'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-myprofile-user_id',
            'myprofile'
        );

        $this->dropTable('myprofile');
    }
}
