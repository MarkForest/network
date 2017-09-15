<?php

use yii\db\Migration;

/**
 * Handles dropping job_title from table `myprofile`.
 */
class m170828_205926_drop_job_title_column_from_myprofile_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('myprofile', 'job_title');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('myprofile', 'job_title', $this->varchar());
    }
}
