<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Control de Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="m-0 text-secondary"><i class="fas fa-users"></i> <?= Html::encode($this->title) ?></h1>
        <?= Html::a('<i class="fas fa-plus"></i> Nuevo Usuario', ['create'], ['class' => 'btn btn-success shadow-sm']) ?>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class' => 'table table-hover table-striped table-bordered m-0 align-middle'],
                'layout' => "{items}\n<div class='p-3 d-flex justify-content-between text-muted small'>{summary}{pager}</div>",
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'headerOptions' => ['style' => 'width: 50px;', 'class' => 'text-center bg-light'],
                        'contentOptions' => ['class' => 'text-center'],
                    ],
                    [
                        'attribute' => 'id',
                        'headerOptions' => ['style' => 'width: 70px;', 'class' => 'text-center bg-light'],
                        'contentOptions' => ['class' => 'text-center fw-bold'],
                    ],
                    [
                        'attribute' => 'username',
                        'label' => 'Usuario',
                        'headerOptions' => ['class' => 'bg-light'],
                    ],
                    [
                        'attribute' => 'roles',
                        'label' => 'Rol',
                        'headerOptions' => ['style' => 'width: 120px;', 'class' => 'bg-light text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                        'format' => 'raw',
                        'value' => function($model) {
                            $class = $model->roles === 'admin' ? 'badge bg-danger' : 'badge bg-primary';
                            return Html::tag('span', strtoupper($model->roles), ['class' => $class]);
                        }
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Acciones',
                        'headerOptions' => ['style' => 'width: 220px;', 'class' => 'text-center bg-light'],
                        'contentOptions' => ['class' => 'text-center'],
                        'template' => '<div class="btn-group btn-group-sm" role="group">{view} {update} {delete} {reset-password}</div>',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<i class="fas fa-eye"></i>', $url, ['class' => 'btn btn-outline-secondary', 'title' => 'Ver detalles']);
                            },
                            'update' => function ($url, $model) {
                                return Html::a('<i class="fas fa-pencil-alt"></i>', $url, ['class' => 'btn btn-outline-primary', 'title' => 'Editar']);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('<i class="fas fa-trash"></i>', $url, [
                                    'class' => 'btn btn-outline-danger',
                                    'title' => 'Eliminar',
                                    'data' => ['confirm' => '¿Está seguro de eliminar este usuario?', 'method' => 'post']
                                ]);
                            },
                            'reset-password' => function ($url, $model, $key) {
                                return Html::a('<i class="fas fa-key"></i> Clave', ['reset-password', 'id' => $model->id], [
                                    'class' => 'btn btn-warning text-dark',
                                    'data' => [
                                        'confirm' => '¿Estás seguro de que deseas restablecer la contraseña de este usuario?',
                                        'method' => 'post',
                                    ],
                                ]);
                            },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>