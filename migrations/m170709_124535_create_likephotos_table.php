<?php

use yii\db\Migration;

/**
 * Handles the creation of table `likephotos`.
 * Has foreign keys to the tables:
 *
 * - `photos`
 */
class m170709_124535_create_likephotos_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('likephotos', [
            'id' => $this->primaryKey(),
            'profile_id'=>$this->integer()->notNull()->unique(),
            'photo_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `photo_id`
        $this->createIndex(
            'idx-likephotos-photo_id',
            'likephotos',
            'photo_id'
        );

        // add foreign key for table `photos`
        $this->addForeignKey(
            'fk-likephotos-photo_id',
            'likephotos',
            'photo_id',
            'photos',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `photos`
        $this->dropForeignKey(
            'fk-likephotos-photo_id',
            'likephotos'
        );

        // drops index for column `photo_id`
        $this->dropIndex(
            'idx-likephotos-photo_id',
            'likephotos'
        );

        $this->dropTable('likephotos');
    }
}
