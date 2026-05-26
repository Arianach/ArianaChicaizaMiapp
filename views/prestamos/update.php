<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Prestamos $model */

$this->title = Yii::t('app', 'Update Prestamos: {name}', [
    'name' => $model->idPrestamos,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prestamos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPrestamos, 'url' => ['view', 'idPrestamos' => $model->idPrestamos]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="prestamos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
