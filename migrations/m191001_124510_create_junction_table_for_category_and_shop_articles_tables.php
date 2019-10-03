<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category_shop_articles}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 * - `{{%shop_articles}}`
 */
class m191001_124510_create_junction_table_for_category_and_shop_articles_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category_shop_articles}}', [
            'category_id' => $this->integer(),
            'shop_articles_id' => $this->integer(),
            'PRIMARY KEY(category_id, shop_articles_id)',
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-category_shop_articles-category_id}}',
            '{{%category_shop_articles}}',
            'category_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-category_shop_articles-category_id}}',
            '{{%category_shop_articles}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );

        // creates index for column `shop_articles_id`
        $this->createIndex(
            '{{%idx-category_shop_articles-shop_articles_id}}',
            '{{%category_shop_articles}}',
            'shop_articles_id'
        );

        // add foreign key for table `{{%shop_articles}}`
        $this->addForeignKey(
            '{{%fk-category_shop_articles-shop_articles_id}}',
            '{{%category_shop_articles}}',
            'shop_articles_id',
            '{{%shop_articles}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-category_shop_articles-category_id}}',
            '{{%category_shop_articles}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-category_shop_articles-category_id}}',
            '{{%category_shop_articles}}'
        );

        // drops foreign key for table `{{%shop_articles}}`
        $this->dropForeignKey(
            '{{%fk-category_shop_articles-shop_articles_id}}',
            '{{%category_shop_articles}}'
        );

        // drops index for column `shop_articles_id`
        $this->dropIndex(
            '{{%idx-category_shop_articles-shop_articles_id}}',
            '{{%category_shop_articles}}'
        );

        $this->dropTable('{{%category_shop_articles}}');
    }
}
