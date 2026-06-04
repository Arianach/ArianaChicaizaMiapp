<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Prestamos $model */

$this->title = 'Nuevo préstamo';
$this->params['breadcrumbs'][] = ['label' => 'Préstamos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$css = <<<CSS
.prestamos-create { padding: 2rem 0 3rem; }
.module-header { margin-bottom: 1.75rem; }
.module-header .page-badge {
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
.module-header h1 {
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
    color: #1a1a2e;
    margin: 0;
}
CSS;
$this->registerCss($css);
?>

<div class="prestamos-create">
    <div class="module-header">
        <div class="page-badge"><i class="ti ti-arrows-exchange"></i> Gestión</div>
        <h1>Nuevo préstamo</h1>
    </div>

    <?= $this->render('_form', ['model' => $model]) ?>
</div>