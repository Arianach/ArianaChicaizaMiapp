<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ChangePasswordForm $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = 'Cambiar Contraseña';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-change-password container py-4">

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">
            
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="card-title mb-0"><i class="fas fa-lock"></i> <?= Html::encode($this->title) ?></h5>
                </div>
                
                <div class="card-body p-4">
                    <p class="text-muted small mb-4">
                        Por favor, complete los siguientes campos para actualizar su contraseña de acceso de forma segura.
                    </p>

                    <?php $form = ActiveForm::begin([
                        'options' => ['class' => 'needs-validation']
                    ]); ?>

                    <div class="mb-3">
                        <?= $form->field($model, 'currentPassword')->passwordInput([
                            'placeholder' => 'Ingrese su contraseña actual',
                            'class' => 'form-control'
                        ])->label('Contraseña Actual') ?>
                    </div>

                    <div class="mb-3">
                        <?= $form->field($model, 'newPassword')->passwordInput([
                            'placeholder' => 'Mínimo 6 u 8 caracteres',
                            'class' => 'form-control'
                        ])->label('Nueva Contraseña') ?>
                    </div>

                    <div class="mb-4">
                        <?= $form->field($model, 'confirmPassword')->passwordInput([
                            'placeholder' => 'Repita la nueva contraseña',
                            'class' => 'form-control'
                        ])->label('Confirmar Nueva Contraseña') ?>
                    </div>

                    <hr class="text-muted mb-4">

                    <div class="d-grid gap-2">
                        <?= Html::submitButton('<i class="fas fa-sync-alt"></i> Actualizar Contraseña', [
                            'class' => 'btn btn-primary btn-block py-2 shadow-sm fw-bold'
                        ]) ?>
                        <?= Html::a('Volver al Inicio', ['site/index'], ['class' => 'btn btn-light btn-sm mt-1']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>
    </div>
</div>