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

    /**
     * Displays a single ShopArticles model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ShopArticles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ShopArticles();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ShopArticles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ShopArticles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ShopArticles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ShopArticles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ShopArticles::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionEntry($id)
    {
        $query = ShopArticles::find();
        $articles = $query->orderBy('id')
            ->where(['brand_id' => $id])
            ->offset(0)
            ->limit('all')
            ->all();
        return $articles;

    }
    public function actionSearch($article)
    {
        $queryArticles = ShopArticles::find();
        $queryBrands = ShopBrands::find();
        $articlesMy = $queryArticles->orderBy('article')
            ->where(['article' => $article])
            ->offset(0)
            ->limit('all')
            ->all();

        return $articlesMy;


        foreach($articlesMy as $branding){
            $brandId = $branding->brand_id;
        };

        $brandsMy = $queryBrands->orderBy('id')
            ->where(['id' => $brandId])
            ->offset(0)
            ->limit('all')
            ->all();
        return $brandsMy;

    }

}
