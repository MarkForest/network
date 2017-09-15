<?php

use yii\db\Migration;

/**
 * Handles adding post to table `work_exp`.
 */
class m170901_001020_add_post_column_to_work_exp_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('work_exp', 'post', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('work_exp', 'post');
    }
}
