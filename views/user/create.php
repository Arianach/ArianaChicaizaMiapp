<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Crear Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create container py-4">

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="card-title mb-0"><i class="fas fa-user-plus"></i> <?= Html::encode($this->title) ?></h5>
                </div>
                
                <div class="card-body p-4">
                    <?php $form = ActiveForm::begin([
                        'options' => ['class' => 'needs-validation']
                    ]); ?>

                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <?= $form->field($model, 'nombre')->textInput([
                                'maxlength' => true, 
                                'placeholder' => 'Ej. Juan',
                                'class' => 'form-control'
                            ])->label('Nombre(s)') ?>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <?= $form->field($model, 'apellido')->textInput([
                                'maxlength' => true, 
                                'placeholder' => 'Ej. Pérez',
                                'class' => 'form-control'
                            ])->label('Apellido(s)') ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <?= $form->field($model, 'username')->textInput([
                            'maxlength' => true, 
                            'placeholder' => 'Nombre de usuario único',
                            'class' => 'form-control'
                        ])->label('Nombre de Usuario (Login)') ?>
                    </div>

                    <div class="mb-3">
                        <?= $form->field($model, 'password')->passwordInput([
                            'maxlength' => true, 
                            'placeholder' => 'Asigne una contraseña segura',
                            'class' => 'form-control'
                        ])->label('Contraseña') ?>
                    </div>

                    <div class="mb-4">
                        <?= $form->field($model, 'roles')->dropDownList([
                            'user' => 'Usuario Estándar',
                            'admin' => 'Administrador del Sistema',
                        ], [
                            'class' => 'form-select'
                        ])->label('Rol asignado') ?>
                    </div>

                    <hr class="text-muted mb-4">

                    <div class="d-flex justify-content-end gap-2">
                        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-light px-4']) ?>
                        <?= Html::submitButton('<i class="fas fa-save"></i> Guardar Usuario', ['class' => 'btn btn-success px-4 shadow-sm']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>
    </div>
</div>