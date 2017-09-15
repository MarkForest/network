<?php

use yii\db\Migration;

/**
 * Handles adding profile_friend_id to table `friends`.
 */
class m170901_205527_add_profile_friend_id_column_to_friends_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('friends', 'profile_friend_id', $this->integer()->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('friends', 'profile_friend_id');
    }
}
