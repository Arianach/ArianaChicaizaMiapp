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

$css = <<<CSS
.libros-index { padding: 2rem 0 3rem; }

.module-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 1.75rem;
}
.module-header-left .page-badge {
    display: inline-block;
    background: rgba(240,200,122,0.15);
    color: #c49a30;
    border: 1px solid rgba(240,200,122,0.35);
    padding: 3px 12px;
    border-radius: 20px;
    font-size: 0.72rem;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    margin-bottom: 0.5rem;
}
.module-header-left h1 {
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
    color: #1a1a2e;
    margin: 0;
}
.btn-crear {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: #1a1a2e;
    color: #f0c87a !important;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 0.875rem;
    font-weight: 500;
    font-family: 'DM Sans', sans-serif;
    text-decoration: none !important;
    transition: opacity 0.15s, transform 0.15s;
    white-space: nowrap;
    align-self: center;
}
.btn-crear:hover { opacity: 0.88; transform: translateY(-1px); }

.grid-wrap {
    background: #fff;
    border: 1px solid #ece9e0;
    border-radius: 14px;
    overflow: hidden;
}
.grid-wrap .table { margin: 0; font-size: 0.875rem; }
.grid-wrap .table thead th {
    background: #f7f5f0;
    color: #555;
    font-size: 0.75rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    border-bottom: 1px solid #ece9e0;
    border-top: none;
    padding: 12px 16px;
}
.grid-wrap .table tbody td {
    color: #1a1a2e;
    border-color: #f0ede5;
    padding: 10px 16px;
    vertical-align: middle;
}
.grid-wrap .table tbody tr:hover td { background: #faf8f3; }

.grid-wrap .filters input.form-control,
.grid-wrap .filters select.form-control {
    border: 1px solid #ddd8ce;
    border-radius: 6px;
    font-size: 0.82rem;
    padding: 5px 10px;
    background: #fafaf8;
}
.grid-wrap .filters input.form-control:focus,
.grid-wrap .filters select.form-control:focus {
    border-color: #c49a30;
    box-shadow: 0 0 0 2px rgba(196,154,48,0.12);
    outline: none;
}

/* Portada del libro */
.book-cover {
    width: 48px; height: 64px;
    border-radius: 6px;
    object-fit: cover;
    border: 1px solid #ece9e0;
    display: block;
}
.book-cover-empty {
    width: 48px; height: 64px;
    border-radius: 6px;
    background: #f7f5f0;
    border: 1px dashed #ddd8ce;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ccc;
    font-size: 18px;
}

/* Badges */
.cat-badge {
    display: inline-block;
    background: #f7f3e8;
    color: #c49a30;
    border: 1px solid rgba(196,154,48,0.25);
    padding: 2px 9px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 500;
}
.autor-badge {
    display: inline-block;
    background: #e6f1fb;
    color: #185fa5;
    border: 1px solid #b5d4f4;
    padding: 2px 9px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 500;
}

/* Botones acción */
.grid-wrap a[href*="view"]   { color:#185fa5; border-color:#b5d4f4; font-size:0.8rem; padding:4px 10px; border-radius:6px; border:1px solid; background:#fff; text-decoration:none; margin:0 2px; display:inline-block; transition:background 0.15s; }
.grid-wrap a[href*="view"]:hover   { background:#e6f1fb; }
.grid-wrap a[href*="update"] { color:#3b6d11; border-color:#c0dd97; font-size:0.8rem; padding:4px 10px; border-radius:6px; border:1px solid; background:#fff; text-decoration:none; margin:0 2px; display:inline-block; transition:background 0.15s; }
.grid-wrap a[href*="update"]:hover { background:#eaf3de; }
.grid-wrap a[href*="delete"] { color:#a32d2d; border-color:#f7c1c1; font-size:0.8rem; padding:4px 10px; border-radius:6px; border:1px solid; background:#fff; text-decoration:none; margin:0 2px; display:inline-block; transition:background 0.15s; }
.grid-wrap a[href*="delete"]:hover { background:#fcebeb; }

.grid-wrap .pagination { padding: 1rem 1rem 0.5rem; justify-content: flex-end; margin: 0; }
.grid-wrap .page-item .page-link { border:1px solid #ece9e0; color:#555; font-size:0.82rem; border-radius:6px !important; margin:0 2px; padding:5px 10px; }
.grid-wrap .page-item.active .page-link { background:#1a1a2e; border-color:#1a1a2e; color:#f0c87a; }
.grid-wrap .summary { font-size:0.78rem; color:#aaa; padding:0.75rem 1rem 0; text-align:right; }
CSS;

$this->registerCss($css);
?>

<div class="libros-index">

    <div class="module-header">
        <div class="module-header-left">
            <div class="page-badge"><i class="ti ti-books"></i> Gestión</div>
            <h1>Libros</h1>
        </div>
        <?= Html::a(
            '<i class="ti ti-plus"></i> Nuevo libro',
            ['create'],
            ['class' => 'btn-crear']
        ) ?>
    </div>

    <div class="grid-wrap">
        <?php Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'tableOptions' => ['class' => 'table table-hover'],
            'summary'      => '<div class="summary">Mostrando {begin}–{end} de {totalCount} libros</div>',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn', 'header' => '#'],
                ['attribute' => 'idLibros',   'label' => 'ID'],
                ['attribute' => 'titulo',     'label' => 'Título'],
                ['attribute' => 'añopublicacion', 'label' => 'Año'],
                [
                    'label'  => 'Autor',
                    'format' => 'raw',
                    'value'  => function ($model) {
                        $autor = \app\models\Autores::findOne($model->Autores_idautores);
                        $nombre = $autor ? Html::encode($autor->nombre) : '<span style="color:#ccc">—</span>';
                        return '<span class="autor-badge">' . $nombre . '</span>';
                    },
                ],
                [
                    'label'  => 'Categoría',
                    'format' => 'raw',
                    'value'  => function ($model) {
                        $cat = \app\models\Categorias::findOne($model->Categorias_idCategoria);
                        $nombre = $cat ? Html::encode($cat->nombres) : '<span style="color:#ccc">—</span>';
                        return '<span class="cat-badge">' . $nombre . '</span>';
                    },
                ],
                [
                    'label'  => 'Portada',
                    'format' => 'raw',
                    'value'  => function ($model) {
                        if ($model->imagen) {
                            return Html::img(
                                Yii::getAlias('@web/') . $model->imagen,
                                ['class' => 'book-cover', 'alt' => 'portada']
                            );
                        }
                        return '<div class="book-cover-empty"><i class="ti ti-photo-off"></i></div>';
                    },
                ],
                [
                    'class'      => ActionColumn::className(),
                    'header'     => 'Acciones',
                    'urlCreator' => function ($action, Libros $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'idLibros' => $model->idLibros]);
                    },
                ],
            ],
        ]); ?>

        <?php Pjax::end(); ?>
    </div>

</div>