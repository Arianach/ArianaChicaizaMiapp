<?php

use app\models\Libros;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\LibrosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Libros');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Libros'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idLibros',
            'titulo',
            'añopublicacion',
            'Autores_idautores',
            'Categorias_idCategoria',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Libros $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idLibros' => $model->idLibros]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
