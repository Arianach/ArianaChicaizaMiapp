<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Libros $model */

$this->title = Yii::t('app', 'Update Libros: {name}', [
    'name' => $model->idLibros,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idLibros, 'url' => ['view', 'idLibros' => $model->idLibros]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="libros-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
