<?php

use yii\db\Migration;

/**
 * Handles adding avatar to table `avatars`.
 */
class m170830_184706_add_avatar_column_to_avatars_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('avatars', 'avatar', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('avatars', 'avatar');
    }
}
