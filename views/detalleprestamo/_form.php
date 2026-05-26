<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Detalleprestamo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detalleprestamo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Detalleprestamocol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'Prestamos_idPrestamos')->textInput() ?>

    <?= $form->field($model, 'Libros_idLibros')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
