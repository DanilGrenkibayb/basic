<?php


namespace app\models;


class CategoryShop  extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'category_shop_articles';
    }
    public function getShopArticles(){
        return $this->hasOne(ShopArticles::className(),[
            'id'=> 'category_id',
        ] );
    }

}
