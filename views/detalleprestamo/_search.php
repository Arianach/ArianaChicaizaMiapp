<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DetalleprestamoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detalleprestamo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idprestamo') ?>

    <?= $form->field($model, 'Detalleprestamocol') ?>

    <?= $form->field($model, 'cantidad') ?>

    <?= $form->field($model, 'Prestamos_idPrestamos') ?>

    <?= $form->field($model, 'Libros_idLibros') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
