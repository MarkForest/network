<?php

use yii\db\Migration;

/**
 * Handles adding avatar to table `friends`.
 */
class m170901_210213_add_avatar_column_to_friends_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('friends', 'avatar', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('friends', 'avatar');
    }
}
