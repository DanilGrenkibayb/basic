<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_articles}}`.
 */
class m190930_121002_create_shop_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shop_articles}}', [
            'id' => $this->primaryKey(),
            'article' => $this->string(),
            'brand_id' => $this->integer(),
            'name' => $this->string(),
            'date_add' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shop_articles}}');
    }
}
