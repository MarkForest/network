<?php

use yii\db\Migration;

/**
 * Handles adding main_avatar to table `avatars`.
 */
class m170828_194105_add_main_avatar_column_to_avatars_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('avatars', 'main_avatar', $this->string(255)->defaultValue('none'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('avatars', 'main_avatar');
    }
}
