<?php

use app\models\Detalleprestamo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\DetalleprestamoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Detalleprestamos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalleprestamo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Detalleprestamo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idprestamo',
            'Detalleprestamocol',
            'cantidad',
            'Prestamos_idPrestamos',
            'Libros_idLibros',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Detalleprestamo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idprestamo' => $model->idprestamo]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
