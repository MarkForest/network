<?php

use yii\db\Migration;

/**
 * Handles the creation of table `interests`.
 * Has foreign keys to the tables:
 *
 * - `myprofile`
 */
class m170709_122706_create_interests_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('interests', [
            'id' => $this->primaryKey(),
            'interest'=>$this->string()->notNull(),
            'profile_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `profile_id`
        $this->createIndex(
            'idx-interests-profile_id',
            'interests',
            'profile_id'
        );

        // add foreign key for table `myprofile`
        $this->addForeignKey(
            'fk-interests-profile_id',
            'interests',
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
            'fk-interests-profile_id',
            'interests'
        );

        // drops index for column `profile_id`
        $this->dropIndex(
            'idx-interests-profile_id',
            'interests'
        );

        $this->dropTable('interests');
    }
}
