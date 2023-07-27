<?php
?>
<!-- create.php -->

<h1>Добавить замок</h1>

<?php $form = \yii\widgets\ActiveForm::begin(); ?>

<?= $form->field($lock, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($lock, 'code')->textInput(['maxlength' => true]) ?>

<?= $form->field($lock, 'description')->textarea(['rows' => 6]) ?>

<div class="form-group">
    <?= \yii\helpers\Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
</div>

<?php \yii\widgets\ActiveForm::end(); ?>