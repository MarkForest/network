<?php

use yii\db\Migration;

/**
 * Handles the creation of table `settings`.
 * Has foreign keys to the tables:
 *
 * - `myprofile`
 */
class m170903_234915_create_settings_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('settings', [
            'id' => $this->primaryKey(),
            'aboutMe'=>$this->integer()->defaultValue(1),
            'aboutWork'=>$this->integer()->defaultValue(1),
            'requestFriend'=>$this->integer()->defaultValue(1),
            'messages'=>$this->integer()->defaultValue(1),
            'sound'=>$this->integer()->defaultValue(1),
            'profile_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `profile_id`
        $this->createIndex(
            'idx-settings-profile_id',
            'settings',
            'profile_id'
        );

        // add foreign key for table `myprofile`
        $this->addForeignKey(
            'fk-settings-profile_id',
            'settings',
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
            'fk-settings-profile_id',
            'settings'
        );

        // drops index for column `profile_id`
        $this->dropIndex(
            'idx-settings-profile_id',
            'settings'
        );

        $this->dropTable('settings');
    }
}
