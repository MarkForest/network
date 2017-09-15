<?php

use yii\db\Migration;

/**
 * Handles adding background to table `friends`.
 */
class m170901_210152_add_background_column_to_friends_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('friends', 'background', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('friends', 'background');
    }
}
