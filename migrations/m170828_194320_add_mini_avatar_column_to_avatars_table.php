<?php

use yii\db\Migration;

/**
 * Handles adding mini_avatar to table `avatars`.
 */
class m170828_194320_add_mini_avatar_column_to_avatars_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('avatars', 'mini_avatar', $this->string(255)->defaultValue('none'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('avatars', 'mini_avatar');
    }
}
