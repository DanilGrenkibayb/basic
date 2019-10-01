<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ShopBrands */

$this->title = 'Create Shop Brands';
$this->params['breadcrumbs'][] = ['label' => 'Shop Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-brands-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
