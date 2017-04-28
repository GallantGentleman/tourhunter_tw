<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<h1>Login</h1>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'nickname')->label('Nickname'); ?>
    <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
