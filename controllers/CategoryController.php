<?php


namespace app\controllers;


use app\models\Category;
use app\models\CategoryShop;
use app\models\ShopArticles;
use app\models\ShopBrands;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class CategoryController extends ActiveController
{
    public $modelClass = 'app\models\ShopArticles';

    public function actions()
    {
        $actions = parent::actions();
        // настроить подготовку провайдера данных с помощью метода "prepareDataProvider()"
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }
    public function prepareDataProvider()
    {
        $query = Category::find()->where([]);
        $catID = \Yii::$app->request->get('category_id');
        if($catID){
            $shopArticlesId = CategoryShop::find()->where(['shop_articles_id' => $catID])->one()->id;
            $query = ShopArticles::find()->where(['id' => $shopArticlesId]);
        };

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }

    public function actionCatid($id)
    {
        $query = Category::find();
        $query = $query->where(['id' => $id]);
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 2,
            ],
        ]);
        return $provider;
    }
}