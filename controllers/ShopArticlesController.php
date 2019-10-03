<?php

namespace app\controllers;

use app\models\Category;
use app\models\CategoryShop;
use app\models\ShopArticles;
use app\models\ShopBrands;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;
use yii\rest\ActiveController;

/**
 * ShopArticlesController implements the CRUD actions for ShopArticles model.
 */
class ShopArticlesController extends ActiveController
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
        $query = ShopArticles::find()->where([]);
        $brand_name = \Yii::$app->request->get('brand_name');
        $catID = \Yii::$app->request->get('category_id');
        if($catID){
            $sql = "SELECT shop_articles_id FROM `category_shop_articles` WHERE `category_id`=:id";
            $ids = \Yii::$app->db->createCommand($sql)->bindValue(':id', $catID)->queryColumn();
            $query = ShopArticles::find()->where(['id' => $ids,]);
        };
        if($brand_name){
            $brandId = ShopBrands::find()->where(['name' => $brand_name])->one()->id;
            $query = ShopArticles::find()->where(['brand_id' => $brandId]);
        };

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }


    /**
     * Lists all ShopArticles models.
     * @return mixed
     */
//    public function prepareDataProvider()
//    {
//        $bid = \Yii::$app->request->get('brand_id');
//        $query = ShopArticles::find()->where(['brand_id' => $bid]);
//        return new ActiveDataProvider([
//            'query' => $query,
//        ]);
//    }
//    public function actionIndex()
//    {
//        $searchModel = new ShopArticlesSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
//    }


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
