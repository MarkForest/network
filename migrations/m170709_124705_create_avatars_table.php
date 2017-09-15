<?php

use yii\db\Migration;

/**
 * Handles the creation of table `avatars`.
 * Has foreign keys to the tables:
 *
 * - `myprofile`
 */
class m170709_124705_create_avatars_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('avatars', [
            'id' => $this->primaryKey(),
            'main_avatar'=>$this->string()->defaultValue('none'),
            'mini_avatar'=>$this->string()->defaultValue('none'),
            'background'=>$this->string()->defaultValue('none'),
            'profile_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `profile_id`
        $this->createIndex(
            'idx-avatars-profile_id',
            'avatars',
            'profile_id'
        );

        // add foreign key for table `myprofile`
        $this->addForeignKey(
            'fk-avatars-profile_id',
            'avatars',
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
            'fk-avatars-profile_id',
            'avatars'
        );

        // drops index for column `profile_id`
        $this->dropIndex(
            'idx-avatars-profile_id',
            'avatars'
        );

        $this->dropTable('avatars');
    }
}
