<?php

use yii\db\Migration;

/**
 * Handles dropping date_poped from table `work_exp`.
 */
class m170906_165242_drop_date_poped_column_from_work_exp_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('work_exp', 'date_poped');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('work_exp', 'date_poped', $this->date());
    }
}
