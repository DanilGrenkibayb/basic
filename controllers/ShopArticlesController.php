<?php

namespace app\controllers;

use app\models\EntryForm;
use app\models\ShopBrands;
use Yii;
use app\models\ShopArticles;
use app\models\ShopArticlesSearch;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ShopArticlesController implements the CRUD actions for ShopArticles model.
 */
class ShopArticlesController extends ActiveController
{
    public $modelClass = 'app\models\ShopArticles';


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
