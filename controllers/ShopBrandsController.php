<?php


namespace app\controllers;


use app\models\ShopArticles;
use app\models\ShopBrands;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class ShopBrandsController extends ActiveController
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
        // подготовить и вернуть провайдер данных для действия "index"
        $brand_name = \Yii::$app->request->get('brand_name');
        $query = ShopBrands::find()->where([]);
        if($brand_name){
            $brandId = ShopBrands::find()->where(['name' => $brand_name])->one()->id;
            $query = ShopArticles::find()->where(['brand_id' => $brandId]);
        };

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
    public function actionByBrand($id)
    {
        $query = ShopArticles::find();
        $query = $query->where(['brand_id' => $id]);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 2,
            ],
        ]);

        return $provider;

    }
    public function actionSearch($article)
    {
        $queryArticles = ShopArticles::find();

        $queryArticles = $queryArticles->where(['article' => $article]);
        $articlesSearch = new ActiveDataProvider([
            'query' => $queryArticles,
            'pagination' => [
                'pageSize' => 2,
            ],
        ]);
        return $articlesSearch;
    }
}