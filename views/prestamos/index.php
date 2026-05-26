<?php

use app\models\Prestamos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PrestamosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Prestamos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestamos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Prestamos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idPrestamos',
            'fechaprestamo',
            'fechadevolucion',
            'Usuarios_idusuario',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Prestamos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idPrestamos' => $model->idPrestamos]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
