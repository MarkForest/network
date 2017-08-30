<?php

use yii\db\Migration;

/**
 * Handles dropping mini_avatar from table `avatars`.
 */
class m170828_193752_drop_mini_avatar_column_from_avatars_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('avatars', 'mini_avatar');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('avatars', 'mini_avatar', $this->varchar());
    }
}
