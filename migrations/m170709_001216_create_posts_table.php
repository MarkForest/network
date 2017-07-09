<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts`.
 * Has foreign keys to the tables:
 *
 * - `myprofile`
 */
class m170709_001216_create_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'image'=>$this->string(),
            'published_date'=>$this->date(),
            'content'=>$this->text()->notNull(),
            'profile_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `profile_id`
        $this->createIndex(
            'idx-posts-profile_id',
            'posts',
            'profile_id'
        );

        // add foreign key for table `myprofile`
        $this->addForeignKey(
            'fk-posts-profile_id',
            'posts',
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
            'fk-posts-profile_id',
            'posts'
        );

        // drops index for column `profile_id`
        $this->dropIndex(
            'idx-posts-profile_id',
            'posts'
        );

        $this->dropTable('posts');
    }
}
