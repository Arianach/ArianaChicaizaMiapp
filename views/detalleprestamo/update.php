<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detalleprestamo $model */

$this->title = Yii::t('app', 'Update Detalleprestamo: {name}', [
    'name' => $model->idprestamo,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalleprestamos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idprestamo, 'url' => ['view', 'idprestamo' => $model->idprestamo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="detalleprestamo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
