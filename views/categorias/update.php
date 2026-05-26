<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Categorias $model */

$this->title = Yii::t('app', 'Update Categorias: {name}', [
    'name' => $model->idCategoria,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCategoria, 'url' => ['view', 'idCategoria' => $model->idCategoria]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="categorias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
