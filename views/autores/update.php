<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Autores $model */

$this->title = Yii::t('app', 'Update Autores: {name}', [
    'name' => $model->idautores,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Autores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idautores, 'url' => ['view', 'idautores' => $model->idautores]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="autores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
