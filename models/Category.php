<?php


namespace app\models;
use Yii;
use yii\data\ActiveDataProvider;

class Category  extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }
    public function getShopArticles(){
        return $this->hasOne(ShopArticles::className(),[
            'id'=> 'id',
        ] );
    }

    public function getItems()
    {
        return $this->hasMany(ShopArticles::className(), ['category_id ' => 'id'])
            ->viaTable('category_shop_article', ['id ' => 'shop_articles_id']);
    }

}