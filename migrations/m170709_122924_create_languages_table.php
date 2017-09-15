<?php

use yii\db\Migration;

/**
 * Handles the creation of table `languages`.
 * Has foreign keys to the tables:
 *
 * - `myprofile`
 */
class m170709_122924_create_languages_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('languages', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(25)->notNull(),
            'profile_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `profile_id`
        $this->createIndex(
            'idx-languages-profile_id',
            'languages',
            'profile_id'
        );

        // add foreign key for table `myprofile`
        $this->addForeignKey(
            'fk-languages-profile_id',
            'languages',
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
            'fk-languages-profile_id',
            'languages'
        );

        // drops index for column `profile_id`
        $this->dropIndex(
            'idx-languages-profile_id',
            'languages'
        );

        $this->dropTable('languages');
    }
}
