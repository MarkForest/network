<?php

use yii\db\Migration;

/**
 * Handles the creation of table `activities`.
 * Has foreign keys to the tables:
 *
 * - `myprofile`
 */
class m170709_124947_create_activities_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('activities', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()->notNull(),
            'date_of_activity'=>$this->date()->notNull(),
            'profile_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `profile_id`
        $this->createIndex(
            'idx-activities-profile_id',
            'activities',
            'profile_id'
        );

        // add foreign key for table `myprofile`
        $this->addForeignKey(
            'fk-activities-profile_id',
            'activities',
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
            'fk-activities-profile_id',
            'activities'
        );

        // drops index for column `profile_id`
        $this->dropIndex(
            'idx-activities-profile_id',
            'activities'
        );

        $this->dropTable('activities');
    }
}
