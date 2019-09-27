<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
    <h1>Статьи</h1>

<?php foreach ($brandsMy as $articl): ?>
    <ul>
        <li><?= $articl->name ?></li>
        <li><?= $articl->info ?></li>
        <li><?= $articl->info_garanty ?></li>
    </ul>
<?php endforeach; ?>