<?php

use yii\db\Migration;

/**
 * Handles dropping date_pushed from table `work_exp`.
 */
class m170906_165206_drop_date_pushed_column_from_work_exp_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('work_exp', 'date_pushed');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('work_exp', 'date_pushed', $this->date());
    }
}
