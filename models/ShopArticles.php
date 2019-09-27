<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_articles".
 *
 * @property int $id
 * @property string $article
 * @property int $brand_id
 * @property string $name
 * @property string $date_add
 */
class ShopArticles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop_articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article', 'brand_id', 'name'], 'required'],
            [['brand_id'], 'integer'],
            [['date_add'], 'safe'],
            [['article', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article' => 'Article',
            'brand_id' => 'Brand ID',
            'name' => 'Name',
            'date_add' => 'Date Add',
        ];
    }
    public function getShopBrands(){
        return $this->hasOne(ShopBrands::className(),[
            'id'=> 'brand_id'
            ] );

    }

}
