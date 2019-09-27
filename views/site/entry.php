<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

<?php if(Yii::$app->session->hasFlash('success')):
echo Yii::$app->session->getFlash('success');
endif;
?>
<?php if(Yii::$app->session->hasFlash('error')):
echo Yii::$app->session->getFlash('error');
endif;
?>
<?= $form->field($model, 'name')->hint('Пожалуйста, введите имя') ?>
<?= $form->field($model, 'email')->textInput()->input('email', ['placeholder' => "Введите свою почту"])?>
<?= $form->field($model, 'text')->textarea(['rows'=>5]) ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>


