<?php

use yii\db\Migration;

/**
 * Handles adding job_title to table `myprofile`.
 */
class m170828_210058_add_job_title_column_to_myprofile_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('myprofile', 'job_title', $this->string()->defaultValue("Кем работаешь?"));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('myprofile', 'job_title');
    }
}
