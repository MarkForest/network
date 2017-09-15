<?php

use yii\db\Migration;

/**
 * Handles the creation of table `friends`.
 * Has foreign keys to the tables:
 *
 * - `myprofile`
 */
class m170709_125145_create_friends_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('friends', [
            'id' => $this->primaryKey(),
            'first_name'=>$this->string(25)->notNull(),
            'last_name'=>$this->string(25)->notNull(),
            'job_title'=>$this->string(),
            'profile_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `profile_id`
        $this->createIndex(
            'idx-friends-profile_id',
            'friends',
            'profile_id'
        );

        // add foreign key for table `myprofile`
        $this->addForeignKey(
            'fk-friends-profile_id',
            'friends',
            'profile_id',
            'myprofile',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `myprofile`
        $this->dropForeignKey(
            'fk-friends-profile_id',
            'friends'
        );

        // drops index for column `profile_id`
        $this->dropIndex(
            'idx-friends-profile_id',
            'friends'
        );

        $this->dropTable('friends');
    }
}
