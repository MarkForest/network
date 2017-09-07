<?php

use yii\db\Migration;

/**
 * Handles adding to to table `work_exp`.
 */
class m170906_165409_add_to_column_to_work_exp_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('work_exp', 'to', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('work_exp', 'to');
    }
}
