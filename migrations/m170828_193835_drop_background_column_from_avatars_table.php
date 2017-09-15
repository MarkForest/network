<?php

use yii\db\Migration;

/**
 * Handles dropping background from table `avatars`.
 */
class m170828_193835_drop_background_column_from_avatars_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('avatars', 'background');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('avatars', 'background', $this->varchar());
    }
}
