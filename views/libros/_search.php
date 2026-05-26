<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LibrosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="libros-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idLibros') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'añopublicacion') ?>

    <?= $form->field($model, 'Autores_idautores') ?>

    <?= $form->field($model, 'Categorias_idCategoria') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
