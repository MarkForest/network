<?php

use yii\db\Migration;

/**
 * Handles the creation of table `messages`.
 * Has foreign keys to the tables:
 *
 * - `myprofile`
 * - `friends`
 */
class m170709_125640_create_messages_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('messages', [
            'id' => $this->primaryKey(),
            'published_date'=>$this->date()->notNull(),
            'content'=>$this->text()->notNull(),
            'profile_id' => $this->integer()->notNull(),
            'friend_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `profile_id`
        $this->createIndex(
            'idx-messages-profile_id',
            'messages',
            'profile_id'
        );

        // add foreign key for table `myprofile`
        $this->addForeignKey(
            'fk-messages-profile_id',
            'messages',
            'profile_id',
            'myprofile',
            'id',
            'CASCADE'
        );

        // creates index for column `friend_id`
        $this->createIndex(
            'idx-messages-friend_id',
            'messages',
            'friend_id'
        );

        // add foreign key for table `friends`
        $this->addForeignKey(
            'fk-messages-friend_id',
            'messages',
            'friend_id',
            'friends',
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
            'fk-messages-profile_id',
            'messages'
        );

        // drops index for column `profile_id`
        $this->dropIndex(
            'idx-messages-profile_id',
            'messages'
        );

        // drops foreign key for table `friends`
        $this->dropForeignKey(
            'fk-messages-friend_id',
            'messages'
        );

        // drops index for column `friend_id`
        $this->dropIndex(
            'idx-messages-friend_id',
            'messages'
        );

        $this->dropTable('messages');
    }
}
