<?php

use yii\db\Migration;

/**
 * Handles the creation of table `commentphotos`.
 * Has foreign keys to the tables:
 *
 * - `photos`
 */
class m170709_124336_create_commentphotos_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('commentphotos', [
            'id' => $this->primaryKey(),
            'mini_avatar'=>$this->string()->notNull(),
            'content'=>$this->text()->notNull(),
            'author'=>$this->string()->notNull(),
            'photo_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `photo_id`
        $this->createIndex(
            'idx-commentphotos-photo_id',
            'commentphotos',
            'photo_id'
        );

        // add foreign key for table `photos`
        $this->addForeignKey(
            'fk-commentphotos-photo_id',
            'commentphotos',
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
            'fk-commentphotos-photo_id',
            'commentphotos'
        );

        // drops index for column `photo_id`
        $this->dropIndex(
            'idx-commentphotos-photo_id',
            'commentphotos'
        );

        $this->dropTable('commentphotos');
    }
}
