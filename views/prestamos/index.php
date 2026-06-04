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

$this->title = Yii::t('app', 'Préstamos');
$this->params['breadcrumbs'][] = $this->title;

$css = <<<CSS
.prestamos-index { padding: 2rem 0 3rem; }

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
    padding: 11px 16px;
    vertical-align: middle;
}
.grid-wrap .table tbody tr:hover td { background: #faf8f3; }

.grid-wrap .filters input.form-control {
    border: 1px solid #ddd8ce;
    border-radius: 6px;
    font-size: 0.82rem;
    padding: 5px 10px;
    background: #fafaf8;
}
.grid-wrap .filters input.form-control:focus {
    border-color: #c49a30;
    box-shadow: 0 0 0 2px rgba(196,154,48,0.12);
    outline: none;
}

/* Badge de usuario */
.usuario-badge {
    display: inline-block;
    background: #e6f1fb;
    color: #185fa5;
    border: 1px solid #b5d4f4;
    padding: 2px 9px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 500;
}

/* Badge de estado */
.estado-activo {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #eaf3de;
    color: #3b6d11;
    border: 1px solid #c0dd97;
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 500;
}
.estado-vencido {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #fcebeb;
    color: #a32d2d;
    border: 1px solid #f7c1c1;
    padding: 3px 10px;
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

<div class="prestamos-index">

    <div class="module-header">
        <div class="module-header-left">
            <div class="page-badge"><i class="ti ti-arrows-exchange"></i> Gestión</div>
            <h1>Préstamos</h1>
        </div>
        <?= Html::a(
            '<i class="ti ti-plus"></i> Nuevo préstamo',
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
            'summary'      => '<div class="summary">Mostrando {begin}–{end} de {totalCount} préstamos</div>',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn', 'header' => '#'],
                ['attribute' => 'idPrestamos', 'label' => 'ID'],
                [
                    'attribute' => 'fechaprestamo',
                    'label'     => 'Fecha préstamo',
                    'format'    => 'raw',
                    'value'     => function ($model) {
                        return '<span style="font-size:0.85rem"><i class="ti ti-calendar-event" style="vertical-align:-2px;margin-right:4px;color:#c49a30"></i>'
                            . Html::encode($model->fechaprestamo) . '</span>';
                    },
                ],
                [
                    'attribute' => 'fechadevolucion',
                    'label'     => 'Fecha devolución',
                    'format'    => 'raw',
                    'value'     => function ($model) {
                        $hoy     = date('Y-m-d');
                        $vencido = $model->fechadevolucion && $model->fechadevolucion < $hoy;
                        $icon    = $vencido
                            ? '<i class="ti ti-alert-circle" style="vertical-align:-2px;margin-right:4px"></i>'
                            : '<i class="ti ti-calendar-check" style="vertical-align:-2px;margin-right:4px"></i>';
                        $clase   = $vencido ? 'estado-vencido' : 'estado-activo';
                        return '<span class="' . $clase . '">' . $icon . Html::encode($model->fechadevolucion) . '</span>';
                    },
                ],
                [
                    'label'  => 'Usuario',
                    'format' => 'raw',
                    'value'  => function ($model) {
                        $usuario = \app\models\User::findOne($model->Usuarios_idusuario);
                        $nombre  = $usuario ? Html::encode($usuario->username) : Html::encode($model->Usuarios_idusuario);
                        return '<span class="usuario-badge"><i class="ti ti-user" style="vertical-align:-2px;margin-right:4px"></i>' . $nombre . '</span>';
                    },
                ],
                [
                    'class'      => ActionColumn::className(),
                    'header'     => 'Acciones',
                    'urlCreator' => function ($action, Prestamos $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'idPrestamos' => $model->idPrestamos]);
                    },
                ],
            ],
        ]); ?>

        <?php Pjax::end(); ?>
    </div>

</div>