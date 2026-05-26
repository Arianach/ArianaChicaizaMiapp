<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Prestamos $model */

$this->title = $model->idPrestamos;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prestamos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="prestamos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idPrestamos' => $model->idPrestamos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idPrestamos' => $model->idPrestamos], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idPrestamos',
            'fechaprestamo',
            'fechadevolucion',
            'Usuarios_idusuario',
        ],
    ]) ?>

</div>
