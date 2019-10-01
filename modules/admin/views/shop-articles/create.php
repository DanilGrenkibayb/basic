<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ShopArticles */

$this->title = 'Create Shop Articles';
$this->params['breadcrumbs'][] = ['label' => 'Shop Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-articles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
