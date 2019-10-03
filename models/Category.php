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

}