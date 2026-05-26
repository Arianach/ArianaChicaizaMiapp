<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Prestamos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="prestamos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fechaprestamo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechadevolucion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Usuarios_idusuario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
