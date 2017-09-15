<?php

use yii\db\Migration;

/**
 * Handles adding background to table `avatars`.
 */
class m170830_184741_add_background_column_to_avatars_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('avatars', 'background', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('avatars', 'background');
    }
}
