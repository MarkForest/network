<?php

use yii\db\Migration;

/**
 * Handles the creation of table `likeposts`.
 * Has foreign keys to the tables:
 *
 * - `posts`
 */
class m170709_003316_create_likeposts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('likeposts', [
            'id' => $this->primaryKey(),
            'profile_id'=>$this->integer()->notNull()->unique(),
            'post_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            'idx-likeposts-post_id',
            'likeposts',
            'post_id'
        );

        // add foreign key for table `posts`
        $this->addForeignKey(
            'fk-likeposts-post_id',
            'likeposts',
            'post_id',
            'posts',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `posts`
        $this->dropForeignKey(
            'fk-likeposts-post_id',
            'likeposts'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-likeposts-post_id',
            'likeposts'
        );

        $this->dropTable('likeposts');
    }
}
