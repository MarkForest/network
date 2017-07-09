<?php

use yii\db\Migration;

/**
 * Handles the creation of table `work_exp`.
 * Has foreign keys to the tables:
 *
 * - `myprofile`
 */
class m170709_002555_create_work_exp_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('work_exp', [
            'id' => $this->primaryKey(),
            'organizetion_title'=>$this->string()->notNull(),
            'date_pushed'=>$this->date(),
            'date_poped'=>$this->date(),
            'profile_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `profile_id`
        $this->createIndex(
            'idx-work_exp-profile_id',
            'work_exp',
            'profile_id'
        );

        // add foreign key for table `myprofile`
        $this->addForeignKey(
            'fk-work_exp-profile_id',
            'work_exp',
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
            'fk-work_exp-profile_id',
            'work_exp'
        );

        // drops index for column `profile_id`
        $this->dropIndex(
            'idx-work_exp-profile_id',
            'work_exp'
        );

        $this->dropTable('work_exp');
    }
}
