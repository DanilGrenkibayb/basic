<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
    <h1>Countries</h1>

        <?php foreach ($articles as $article): ?>
        <ul>
            <li><?= $article->article ?></li>
            <li><?= $article->brand_id ?></li>
            <li><?= $article->name ?></li>
            <li><?= $article->date_add ?></li>
        </ul>
        <?php endforeach; ?>

