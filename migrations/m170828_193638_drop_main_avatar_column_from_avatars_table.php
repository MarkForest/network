<?php

use yii\db\Migration;

/**
 * Handles dropping main_avatar from table `avatars`.
 */
class m170828_193638_drop_main_avatar_column_from_avatars_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('avatars', 'main_avatar');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('avatars', 'main_avatar', $this->varchar());
    }
}
