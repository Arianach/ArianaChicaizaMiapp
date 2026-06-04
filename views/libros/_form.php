<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Autores;
use app\models\Categorias;

/** @var yii\web\View $this */
/** @var app\models\Libros $model */
/** @var yii\widgets\ActiveForm $form */

// Cargar listas para los dropdowns
$autoresList    = ArrayHelper::map(Autores::find()->orderBy('nombre')->all(), 'idautores', 'nombre');
$categoriasList = ArrayHelper::map(Categorias::find()->orderBy('nombres')->all(), 'idCategoria', 'nombres');

$css = <<<CSS
.libros-form {
    max-width: 680px;
}
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

/* Grid dos columnas */
.form-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}
@media (max-width: 540px) { .form-row-2 { grid-template-columns: 1fr; } }

/* Upload de imagen */
.upload-area {
    border: 2px dashed #ddd8ce;
    border-radius: 10px;
    padding: 1.5rem 1rem;
    text-align: center;
    background: #fafaf8;
    transition: border-color 0.2s;
    cursor: pointer;
}
.upload-area:hover { border-color: #c49a30; }
.upload-area i { font-size: 28px; color: #ddd8ce; display: block; margin-bottom: 0.5rem; }
.upload-area p { font-size: 0.8rem; color: #aaa; margin: 0 0 0.75rem; }
.upload-area input[type="file"] {
    display: block;
    margin: 0 auto;
    font-size: 0.82rem;
    color: #666;
}

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

<div class="libros-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <!-- Card: Información del libro -->
    <div class="form-card">
        <div class="form-card-title">
            <i class="ti ti-book-2" aria-hidden="true"></i> Información del libro
        </div>

        <?= $form->field($model, 'titulo')
            ->textInput(['maxlength' => true, 'placeholder' => 'Título del libro'])
            ->label('Título') ?>

        <div class="form-row-2">
            <?= $form->field($model, 'añopublicacion')
                ->textInput(['placeholder' => 'Ej: 2023'])
                ->label('Año de publicación') ?>

            <div></div>
        </div>
    </div>

    <!-- Card: Clasificación -->
    <div class="form-card">
        <div class="form-card-title">
            <i class="ti ti-tag" aria-hidden="true"></i> Clasificación
        </div>

        <div class="form-row-2">
            <?= $form->field($model, 'Autores_idautores')
                ->dropDownList(
                    $autoresList,
                    ['prompt' => '— Selecciona un autor —', 'class' => 'form-select']
                )
                ->label('<i class="ti ti-user" style="vertical-align:-2px;margin-right:5px"></i> Autor') ?>

            <?= $form->field($model, 'Categorias_idCategoria')
                ->dropDownList(
                    $categoriasList,
                    ['prompt' => '— Selecciona una categoría —', 'class' => 'form-select']
                )
                ->label('<i class="ti ti-tag" style="vertical-align:-2px;margin-right:5px"></i> Categoría') ?>
        </div>
    </div>

    <!-- Card: Portada -->
    <div class="form-card">
        <div class="form-card-title">
            <i class="ti ti-photo" aria-hidden="true"></i> Portada del libro
        </div>

        <div class="upload-area">
            <i class="ti ti-cloud-upload" aria-hidden="true"></i>
            <p>Sube la imagen de portada (JPG, PNG)</p>
            <?= $form->field($model, 'imageFile')
                ->fileInput()
                ->label(false) ?>
        </div>
    </div>

    <!-- Acciones -->
    <div class="form-actions">
        <?= Html::submitButton(
            '<i class="ti ti-device-floppy"></i> Guardar libro',
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