<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\User;

/** @var yii\web\View $this */
/** @var app\models\Prestamos $model */
/** @var yii\widgets\ActiveForm $form */

// Cargar lista de usuarios para el dropdown
$usuariosList = ArrayHelper::map(User::find()->orderBy('username')->all(), 'id', 'username');

$css = <<<CSS
.prestamos-form { max-width: 620px; }

.form-card {
    background: #fff;
    border: 1px solid #ece9e0;
    border-radius: 14px;
    padding: 2rem 2.25rem;
    margin-bottom: 1.25rem;
}
.form-card-title {
    font-size: 0.72rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #aaa;
    margin-bottom: 1.25rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid #f0ede5;
    display: flex;
    align-items: center;
    gap: 7px;
}
.form-card-title i { color: #c49a30; font-size: 15px; }

.form-card .form-label {
    font-size: 0.82rem;
    font-weight: 500;
    color: #444;
    letter-spacing: 0.02em;
    margin-bottom: 5px;
}
.form-card .form-control,
.form-card .form-select {
    border: 1px solid #ddd8ce;
    border-radius: 8px;
    font-size: 0.9rem;
    color: #1a1a2e;
    background: #fafaf8;
    padding: 10px 14px;
    transition: border-color 0.2s, box-shadow 0.2s;
    width: 100%;
}
.form-card .form-control:focus,
.form-card .form-select:focus {
    border-color: #c49a30;
    box-shadow: 0 0 0 3px rgba(196,154,48,0.12);
    background: #fff;
    outline: none;
}
.form-card .mb-3 { margin-bottom: 1.1rem; }

.form-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}
@media (max-width: 540px) { .form-row-2 { grid-template-columns: 1fr; } }

/* Info box de fechas */
.fecha-hint {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #f7f3e8;
    border: 1px solid rgba(196,154,48,0.25);
    border-radius: 8px;
    padding: 10px 14px;
    font-size: 0.8rem;
    color: #8a6a1a;
    margin-top: 0.75rem;
}
.fecha-hint i { font-size: 16px; flex-shrink: 0; }

/* Botones */
.form-actions {
    display: flex;
    gap: 10px;
    align-items: center;
    margin-top: 0.5rem;
}
.btn-guardar {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: #1a1a2e;
    color: #f0c87a !important;
    border: none;
    padding: 11px 24px;
    border-radius: 8px;
    font-size: 0.9rem;
    font-weight: 500;
    font-family: 'DM Sans', sans-serif;
    cursor: pointer;
    transition: opacity 0.15s, transform 0.15s;
}
.btn-guardar:hover { opacity: 0.88; transform: translateY(-1px); }
.btn-cancelar {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: transparent;
    color: #888 !important;
    border: 1px solid #ddd8ce;
    padding: 11px 20px;
    border-radius: 8px;
    font-size: 0.9rem;
    font-family: 'DM Sans', sans-serif;
    text-decoration: none !important;
    cursor: pointer;
    transition: border-color 0.15s, color 0.15s;
}
.btn-cancelar:hover { border-color: #aaa; color: #555 !important; }
CSS;

$this->registerCss($css);
?>

<div class="prestamos-form">

    <?php $form = ActiveForm::begin(['id' => 'prestamos-form']); ?>

    <!-- Card: Fechas -->
    <div class="form-card">
        <div class="form-card-title">
            <i class="ti ti-calendar" aria-hidden="true"></i> Período del préstamo
        </div>

        <div class="form-row-2">
            <?= $form->field($model, 'fechaprestamo')
                ->textInput([
                    'type'        => 'date',
                    'class'       => 'form-control',
                    'value'       => $model->fechaprestamo ?: date('Y-m-d'),
                ])
                ->label('<i class="ti ti-calendar-event" style="vertical-align:-2px;margin-right:5px"></i> Fecha de préstamo') ?>

            <?= $form->field($model, 'fechadevolucion')
                ->textInput([
                    'type'  => 'date',
                    'class' => 'form-control',
                ])
                ->label('<i class="ti ti-calendar-check" style="vertical-align:-2px;margin-right:5px"></i> Fecha de devolución') ?>
        </div>

        <div class="fecha-hint">
            <i class="ti ti-info-circle" aria-hidden="true"></i>
            La fecha de devolución debe ser posterior a la fecha de préstamo.
        </div>
    </div>

    <!-- Card: Usuario -->
    <div class="form-card">
        <div class="form-card-title">
            <i class="ti ti-user" aria-hidden="true"></i> Usuario responsable
        </div>

        <?= $form->field($model, 'Usuarios_idusuario')
            ->dropDownList(
                $usuariosList,
                ['prompt' => '— Selecciona un usuario —', 'class' => 'form-select']
            )
            ->label('<i class="ti ti-user-check" style="vertical-align:-2px;margin-right:5px"></i> Usuario') ?>
    </div>

    <!-- Acciones -->
    <div class="form-actions">
        <?= Html::submitButton(
            '<i class="ti ti-device-floppy"></i> Registrar préstamo',
            ['class' => 'btn-guardar']
        ) ?>
        <?= Html::a(
            '<i class="ti ti-x"></i> Cancelar',
            ['index'],
            ['class' => 'btn-cancelar']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>