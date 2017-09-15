<?php

use yii\db\Migration;

/**
 * Handles the creation of table `photos`.
 * Has foreign keys to the tables:
 *
 * - `myprofile`
 */
class m170709_123824_create_photos_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('photos', [
            'id' => $this->primaryKey(),
            'photo'=>$this->string()->notNull(),
            'published_date'=>$this->date()->notNull(),
            'autor'=>$this->string()->notNull(),
            'mini_avatar'=>$this->string()->notNull(),
            'discription'=>$this->text(),
            'profile_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `profile_id`
        $this->createIndex(
            'idx-photos-profile_id',
            'photos',
            'profile_id'
        );

        // add foreign key for table `myprofile`
        $this->addForeignKey(
            'fk-photos-profile_id',
            'photos',
            'profile_id',
            'myprofile',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `myprofile`
        $this->dropForeignKey(
            'fk-photos-profile_id',
            'photos'
        );

        // drops index for column `profile_id`
        $this->dropIndex(
            'idx-photos-profile_id',
            'photos'
        );

        $this->dropTable('photos');
    }
}
