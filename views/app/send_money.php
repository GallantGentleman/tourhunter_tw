<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<h1>Send Money</h1>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'recipient')->label('Recipient') ?>
    <?= $form->field($model, 'amount')->label('Amount') ?>
    <?= $form->field($model, 'sender')->hiddenInput(['value' => Yii::$app->user->getId()]) ?>
    <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
