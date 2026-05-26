<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Libros $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="libros-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'añopublicacion')->textInput() ?>

    <?= $form->field($model, 'Autores_idautores')->textInput() ?>

    <?= $form->field($model, 'Categorias_idCategoria')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
