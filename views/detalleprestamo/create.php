<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detalleprestamo $model */

$this->title = Yii::t('app', 'Create Detalleprestamo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalleprestamos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalleprestamo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
