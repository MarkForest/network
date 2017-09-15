<?php

use yii\db\Migration;

/**
 * Handles adding from to table `work_exp`.
 */
class m170906_165353_add_from_column_to_work_exp_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('work_exp', 'from', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('work_exp', 'from');
    }
}
