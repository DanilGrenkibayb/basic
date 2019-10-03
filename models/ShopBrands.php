<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_brands".
 *
 * @property int $id
 * @property string $name
 * @property string $logo
 * @property string $info
 * @property string $info_garanty
 * @property int $active
 */
class ShopBrands extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop_brands';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'logo', 'info', 'info_garanty', 'active'], 'required'],
            [['info', 'info_garanty'], 'string'],
            [['active'], 'integer'],
            [['name', 'logo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'logo' => 'Logo',
            'info' => 'Info',
            'info_garanty' => 'Info Garanty',
            'active' => 'Active',
        ];
    }
    public function getShopBrands(){
        return $this->hasOne(ShopArticles::className(),[
            'id'=> 'brand_id'
        ] );

    }
}
