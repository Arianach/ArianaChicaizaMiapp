<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Contáctenos';
$this->params['breadcrumbs'][] = $this->title;

$css = <<<CSS
.site-contact {
    max-width: 900px;
    margin: 0 auto;
    padding: 3rem 1rem 4rem;
}

/* Encabezado de página */
.contact-header {
    margin-bottom: 2.5rem;
}
.contact-header .page-badge {
    display: inline-block;
    background: rgba(240,200,122,0.15);
    color: #c49a30;
    border: 1px solid rgba(240,200,122,0.35);
    padding: 4px 14px;
    border-radius: 20px;
    font-size: 0.73rem;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    margin-bottom: 0.9rem;
}
.contact-header h1 {
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
    color: #1a1a2e;
    margin-bottom: 0.5rem;
}
.contact-header p {
    color: #777;
    font-size: 0.95rem;
    line-height: 1.7;
    max-width: 480px;
}

/* Alerta de éxito */
.contact-success {
    background: #f0f9f4;
    border: 1px solid #a8dfc0;
    border-radius: 12px;
    padding: 1.5rem 1.75rem;
    color: #1a5c3a;
    font-size: 0.9rem;
    line-height: 1.65;
    margin-bottom: 1.5rem;
}
.contact-success strong {
    display: block;
    font-size: 1rem;
    margin-bottom: 0.4rem;
    font-family: 'Playfair Display', serif;
}

/* Layout dos columnas */
.contact-layout {
    display: grid;
    grid-template-columns: 1fr 320px;
    gap: 2.5rem;
    align-items: start;
}
@media (max-width: 720px) {
    .contact-layout { grid-template-columns: 1fr; }
    .contact-sidebar { order: -1; }
}

/* Formulario */
.contact-form-wrap {
    background: #fff;
    border: 1px solid #ece9e0;
    border-radius: 14px;
    padding: 2rem;
}
.contact-form-wrap .form-label {
    font-size: 0.82rem;
    font-weight: 500;
    color: #444;
    letter-spacing: 0.03em;
    margin-bottom: 5px;
}
.contact-form-wrap .form-control {
    border: 1px solid #ddd8ce;
    border-radius: 8px;
    font-size: 0.9rem;
    color: #1a1a2e;
    background: #fafaf8;
    padding: 10px 14px;
    transition: border-color 0.2s, box-shadow 0.2s;
}
.contact-form-wrap .form-control:focus {
    border-color: #c49a30;
    box-shadow: 0 0 0 3px rgba(196,154,48,0.12);
    background: #fff;
    outline: none;
}
.contact-form-wrap .field-contactform-verifycode img {
    border-radius: 8px;
    border: 1px solid #ddd8ce;
}
.contact-form-wrap .form-group,
.contact-form-wrap .mb-3 {
    margin-bottom: 1.1rem;
}
.btn-submit {
    background: #1a1a2e;
    color: #f0c87a !important;
    border: none;
    padding: 11px 28px;
    border-radius: 8px;
    font-size: 0.9rem;
    font-weight: 500;
    font-family: 'DM Sans', sans-serif;
    cursor: pointer;
    transition: opacity 0.15s, transform 0.15s;
    margin-top: 0.5rem;
}
.btn-submit:hover {
    opacity: 0.88;
    transform: translateY(-1px);
}

/* Sidebar de info */
.contact-sidebar {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}
.info-card {
    background: #fff;
    border: 1px solid #ece9e0;
    border-radius: 12px;
    padding: 1.25rem;
    display: flex;
    gap: 14px;
    align-items: flex-start;
    transition: border-color 0.2s;
}
.info-card:hover { border-color: #d4b96a; }
.info-icon {
    width: 38px; height: 38px;
    min-width: 38px;
    background: #f7f3e8;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #c49a30;
    font-size: 18px;
}
.info-card h4 {
    font-size: 0.85rem;
    font-weight: 500;
    color: #1a1a2e;
    margin: 0 0 3px;
}
.info-card p {
    font-size: 0.8rem;
    color: #888;
    margin: 0;
    line-height: 1.5;
}
CSS;

$this->registerCss($css);
?>

<div class="site-contact">

    <!-- Encabezado -->
    <div class="contact-header">
        <div class="page-badge"><i class="ti ti-mail"></i> Soporte</div>
        <h1>Contáctenos</h1>
        <p>¿Tienes dudas o consultas? Completa el formulario y te responderemos a la brevedad posible.</p>
    </div>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="contact-success">
            <strong>¡Mensaje enviado!</strong>
            Gracias por contactarnos. Te responderemos a la brevedad posible.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                <br><br>
                <small>Modo desarrollo: el correo no fue enviado sino guardado en
                <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Ajusta <code>useFileTransport</code> para habilitar el envío real.</small>
            <?php endif; ?>
        </div>

    <?php else: ?>

        <div class="contact-layout">

            <!-- Formulario -->
            <div class="contact-form-wrap">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Tu nombre completo']) ?>

                    <?= $form->field($model, 'email')->input('email', ['placeholder' => 'correo@ejemplo.com']) ?>

                    <?= $form->field($model, 'subject')->textInput(['placeholder' => 'Asunto del mensaje']) ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 5, 'placeholder' => 'Escribe tu mensaje aquí...']) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                        'template' => '<div class="row align-items-center"><div class="col-auto">{image}</div><div class="col">{input}</div></div>',
                    ])->label('Código de verificación') ?>

                    <div class="form-group">
                        <?= Html::submitButton(
                            '<i class="ti ti-send"></i> Enviar mensaje',
                            ['class' => 'btn-submit', 'name' => 'contact-button']
                        ) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>

            <!-- Sidebar -->
            <aside class="contact-sidebar">

                <div class="info-card">
                    <div class="info-icon"><i class="ti ti-clock" aria-hidden="true"></i></div>
                    <div>
                        <h4>Horario de atención</h4>
                        <p>Lunes a viernes<br>8:00 am – 5:00 pm</p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon"><i class="ti ti-mail" aria-hidden="true"></i></div>
                    <div>
                        <h4>Correo electrónico</h4>
                        <p>biblioteca@miapp.com</p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon"><i class="ti ti-phone" aria-hidden="true"></i></div>
                    <div>
                        <h4>Teléfono</h4>
                        <p>+593 99 000 0000</p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon"><i class="ti ti-map-pin" aria-hidden="true"></i></div>
                    <div>
                        <h4>Ubicación</h4>
                        <p>Guayaquil, Ecuador</p>
                    </div>
                </div>

            </aside>

        </div>

    <?php endif; ?>

</div>
