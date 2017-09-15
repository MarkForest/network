<?php

use yii\db\Migration;

/**
 * Handles adding avatar to table `photos`.
 */
class m170911_021118_add_avatar_column_to_photos_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('photos', 'avatar', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('photos', 'avatar');
    }
}
