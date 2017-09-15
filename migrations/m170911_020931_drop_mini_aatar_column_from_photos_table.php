<?php

use yii\db\Migration;

/**
 * Handles dropping mini_aatar from table `photos`.
 */
class m170911_020931_drop_mini_aatar_column_from_photos_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('photos', 'mini_avatar');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('photos', 'mini_avatar', $this->string());
    }
}
