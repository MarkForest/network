<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reletionship`.
 * Has foreign keys to the tables:
 *
 * - `users`
 */
class m170709_000338_create_reletionship_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('reletionship', [
            'id' => $this->primaryKey(),
            'user_add_id'=>$this->integer()->notNull(),
            'status'=>$this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-reletionship-user_id',
            'reletionship',
            'user_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-reletionship-user_id',
            'reletionship',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `users`
        $this->dropForeignKey(
            'fk-reletionship-user_id',
            'reletionship'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-reletionship-user_id',
            'reletionship'
        );

        $this->dropTable('reletionship');
    }
}
