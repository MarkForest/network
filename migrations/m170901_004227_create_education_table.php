<?php

use yii\db\Migration;

/**
 * Handles the creation of table `education`.
 * Has foreign keys to the tables:
 *
 * - `myprofile`
 */
class m170901_004227_create_education_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('education', [
            'id' => $this->primaryKey(),
            'profile_id' => $this->integer()->notNull(),
            'university_name' => $this->string(),
            'from' => $this->integer(),
            'to' => $this->integer(),
        ]);

        // creates index for column `profile_id`
        $this->createIndex(
            'idx-education-profile_id',
            'education',
            'profile_id'
        );

        // add foreign key for table `myprofile`
        $this->addForeignKey(
            'fk-education-profile_id',
            'education',
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
            'fk-education-profile_id',
            'education'
        );

        // drops index for column `profile_id`
        $this->dropIndex(
            'idx-education-profile_id',
            'education'
        );

        $this->dropTable('education');
    }
}
