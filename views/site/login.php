<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Iniciar sesión';
$this->params['breadcrumbs'][] = $this->title;

$css = <<<CSS
.site-login {
    min-height: calc(100vh - 160px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 3rem 1rem;
}

.login-card {
    background: #fff;
    border: 1px solid #ece9e0;
    border-radius: 16px;
    padding: 2.5rem 2.25rem;
    width: 100%;
    max-width: 420px;
    box-shadow: 0 8px 40px rgba(26,26,46,0.07);
}

.login-header {
    text-align: center;
    margin-bottom: 2rem;
}
.login-logo {
    width: 52px; height: 52px;
    background: #1a1a2e;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: #f0c87a;
    font-size: 24px;
}
.login-header h1 {
    font-family: 'Playfair Display', serif;
    font-size: 1.6rem;
    color: #1a1a2e;
    margin-bottom: 0.3rem;
}
.login-header p {
    font-size: 0.85rem;
    color: #999;
    margin: 0;
}

/* Campos */
.login-card .form-label {
    font-size: 0.82rem;
    font-weight: 500;
    color: #444;
    letter-spacing: 0.02em;
    margin-bottom: 5px;
}
.login-card .form-control {
    border: 1px solid #ddd8ce;
    border-radius: 8px;
    font-size: 0.9rem;
    color: #1a1a2e;
    background: #fafaf8;
    padding: 10px 14px;
    transition: border-color 0.2s, box-shadow 0.2s;
}
.login-card .form-control:focus {
    border-color: #c49a30;
    box-shadow: 0 0 0 3px rgba(196,154,48,0.12);
    background: #fff;
    outline: none;
}
.login-card .mb-3 {
    margin-bottom: 1.1rem;
}

/* Checkbox */
.login-card .form-check-label {
    font-size: 0.85rem;
    color: #666;
}
.login-card .form-check-input:checked {
    background-color: #1a1a2e;
    border-color: #1a1a2e;
}

/* Botón */
.btn-login-submit {
    width: 100%;
    background: #1a1a2e;
    color: #f0c87a !important;
    border: none;
    padding: 12px;
    border-radius: 8px;
    font-size: 0.92rem;
    font-weight: 500;
    font-family: 'DM Sans', sans-serif;
    cursor: pointer;
    margin-top: 1.2rem;
    transition: opacity 0.15s, transform 0.15s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}
.btn-login-submit:hover {
    opacity: 0.88;
    transform: translateY(-1px);
}

/* Divider */
.login-divider {
    border: none;
    border-top: 1px solid #ece9e0;
    margin: 1.5rem 0 1.2rem;
}

/* Hint de credenciales */
.login-hint {
    background: #f7f5f0;
    border: 1px solid #ece9e0;
    border-radius: 8px;
    padding: 0.85rem 1rem;
    font-size: 0.78rem;
    color: #888;
    line-height: 1.6;
}
.login-hint strong {
    color: #555;
    font-weight: 500;
}
.login-hint code {
    background: #ece9e0;
    padding: 1px 5px;
    border-radius: 4px;
    font-size: 0.75rem;
    color: #444;
}
CSS;

$this->registerCss($css);
?>

<div class="site-login">
    <div class="login-card">

        <!-- Encabezado -->
        <div class="login-header">
            <div class="login-logo">
                <i class="ti ti-building-library" aria-hidden="true"></i>
            </div>
            <h1>Mi Biblioteca</h1>
            <p>Ingresa tus credenciales para continuar</p>
        </div>

        <!-- Formulario -->
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'errorOptions' => ['class' => 'invalid-feedback'],
            ],
        ]); ?>

            <?= $form->field($model, 'username')->textInput([
                'autofocus' => true,
                'placeholder' => 'Tu usuario',
            ])->label('<i class="ti ti-user" style="vertical-align:-2px;margin-right:5px"></i> Usuario') ?>

            <?= $form->field($model, 'password')->passwordInput([
                'placeholder' => '••••••••',
            ])->label('<i class="ti ti-lock" style="vertical-align:-2px;margin-right:5px"></i> Contraseña') ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"form-check\">{input} {label}</div>\n{error}",
            ])->label('Recordarme') ?>

            <div class="form-group">
                <?= Html::submitButton(
                    '<i class="ti ti-login"></i> Iniciar sesión',
                    ['class' => 'btn-login-submit', 'name' => 'login-button']
                ) ?>
            </div>

        <?php ActiveForm::end(); ?>

        <hr class="login-divider">

        <!-- Hint de credenciales de prueba -->
        <div class="login-hint">
            <i class="ti ti-info-circle" style="vertical-align:-2px;margin-right:4px"></i>
            Puedes ingresar con <strong>admin/admin</strong> o <strong>demo/demo</strong>.<br>
            Para cambiar las credenciales edita <code>app\models\User::$users</code>.
        </div>

    </div>
</div>
