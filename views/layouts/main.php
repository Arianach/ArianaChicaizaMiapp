<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

// Google Fonts + Tabler Icons
$this->registerLinkTag(['rel' => 'preconnect', 'href' => 'https://fonts.googleapis.com']);
$this->registerLinkTag(['rel' => 'preconnect', 'href' => 'https://fonts.gstatic.com', 'crossorigin' => true]);
$this->registerLinkTag(['rel' => 'stylesheet', 'href' => 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@400;500&display=swap']);
$this->registerLinkTag(['rel' => 'stylesheet', 'href' => 'https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css']);

$css = <<<CSS
/* ===== RESET & BASE ===== */
*, *::before, *::after { box-sizing: border-box; }
body {
    font-family: 'DM Sans', sans-serif;
    background: #f7f5f0;
    color: #1a1a2e;
    margin: 0;
    padding-top: 56px; /* offset navbar fija */
}

/* ===== NAVBAR ===== */
.navbar {
    background: #1a1a2e !important;
    height: 56px;
    border-bottom: 1px solid rgba(255,255,255,0.07);
    padding: 0 1.5rem;
}
.navbar-brand {
    font-family: 'Playfair Display', serif !important;
    color: #f0c87a !important;
    font-size: 1.2rem;
    letter-spacing: 0.02em;
}
.navbar-nav .nav-link {
    color: rgba(255,255,255,0.7) !important;
    font-size: 0.875rem;
    padding: 0 0.75rem !important;
    transition: color 0.2s;
}
.navbar-nav .nav-link:hover,
.navbar-nav .nav-link.active {
    color: #f0c87a !important;
}
.navbar-nav .dropdown-menu {
    background: #252540;
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 8px;
    padding: 0.5rem;
    margin-top: 4px;
}
.navbar-nav .dropdown-item {
    color: rgba(255,255,255,0.7);
    font-size: 0.85rem;
    border-radius: 6px;
    padding: 6px 12px;
    transition: background 0.15s, color 0.15s;
}
.navbar-nav .dropdown-item:hover {
    background: rgba(240,200,122,0.15);
    color: #f0c87a;
}
.navbar-toggler {
    border-color: rgba(255,255,255,0.2) !important;
}
/* Botón logout en navbar */
.nav-link.btn.btn-link.logout {
    color: rgba(255,255,255,0.7) !important;
    font-size: 0.875rem;
    padding: 0 0.75rem !important;
    text-decoration: none;
}
.nav-link.btn.btn-link.logout:hover {
    color: #f0c87a !important;
}

/* ===== HERO ===== */
.biblioteca-hero {
    background: #1a1a2e;
    padding: 5rem 2rem 4.5rem;
    position: relative;
    overflow: hidden;
    margin-bottom: 0;
}
.biblioteca-hero::before {
    content: '';
    position: absolute;
    top: -60px; right: -80px;
    width: 400px; height: 400px;
    border-radius: 50%;
    background: rgba(240,200,122,0.06);
    pointer-events: none;
}
.biblioteca-hero::after {
    content: '';
    position: absolute;
    bottom: -80px; left: -40px;
    width: 280px; height: 280px;
    border-radius: 50%;
    background: rgba(100,120,200,0.08);
    pointer-events: none;
}
.hero-inner {
    max-width: 680px;
    margin: 0 auto;
    text-align: center;
    position: relative;
    z-index: 1;
}
.hero-badge {
    display: inline-block;
    background: rgba(240,200,122,0.15);
    color: #f0c87a;
    border: 1px solid rgba(240,200,122,0.3);
    padding: 5px 16px;
    border-radius: 20px;
    font-size: 0.75rem;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    margin-bottom: 1.5rem;
}
.biblioteca-hero h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2rem, 5vw, 3.2rem);
    color: #fff;
    line-height: 1.15;
    margin-bottom: 1rem;
}
.hero-accent { color: #f0c87a; }
.hero-lead {
    color: rgba(255,255,255,0.55);
    font-size: 1rem;
    line-height: 1.7;
    max-width: 520px;
    margin: 0 auto 2.2rem;
}
.hero-actions {
    display: flex;
    gap: 12px;
    justify-content: center;
    flex-wrap: wrap;
}
.btn-primary-lib {
    display: inline-block;
    background: #f0c87a;
    color: #1a1a2e !important;
    padding: 12px 26px;
    border-radius: 8px;
    text-decoration: none !important;
    font-weight: 500;
    font-size: 0.9rem;
    transition: opacity 0.15s, transform 0.15s;
}
.btn-primary-lib:hover { opacity: 0.9; transform: translateY(-1px); }
.btn-outline-lib {
    display: inline-block;
    background: transparent;
    color: rgba(255,255,255,0.7) !important;
    border: 1px solid rgba(255,255,255,0.2);
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none !important;
    font-size: 0.9rem;
    transition: border-color 0.15s, color 0.15s;
}
.btn-outline-lib:hover { border-color: rgba(240,200,122,0.5); color: #f0c87a !important; }

/* ===== ESTADÍSTICAS ===== */
.biblioteca-stats {
    background: #fff;
    border-top: 1px solid #e8e4da;
    border-bottom: 1px solid #e8e4da;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
}
.stat-item {
    padding: 1.5rem 1rem;
    text-align: center;
    border-right: 1px solid #e8e4da;
}
.stat-item:last-child { border-right: none; }
.stat-num {
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
    color: #1a1a2e;
    font-weight: 700;
    line-height: 1;
}
.stat-label {
    font-size: 0.75rem;
    color: #999;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    margin-top: 6px;
}

/* ===== FEATURE CARDS ===== */
.biblioteca-features {
    padding: 3.5rem 2rem 4rem;
    max-width: 900px;
    margin: 0 auto;
}
.feat-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 1.5rem;
}
.feat-card {
    background: #fff;
    border: 1px solid #ece9e0;
    border-radius: 12px;
    padding: 1.5rem;
    transition: border-color 0.2s, box-shadow 0.2s;
}
.feat-card:hover {
    border-color: #d4b96a;
    box-shadow: 0 4px 20px rgba(212,185,106,0.15);
}
.feat-icon {
    width: 42px; height: 42px;
    background: #f7f3e8;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #c49a30;
    font-size: 20px;
    margin-bottom: 1rem;
}
.feat-card h3 {
    font-family: 'Playfair Display', serif;
    font-size: 1.1rem;
    color: #1a1a2e;
    margin-bottom: 0.5rem;
}
.feat-card p {
    font-size: 0.875rem;
    color: #777;
    line-height: 1.65;
    margin: 0;
}
.feat-link {
    display: inline-block;
    margin-top: 1rem;
    font-size: 0.82rem;
    color: #c49a30;
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: border-color 0.15s;
}
.feat-link:hover { border-color: #c49a30; }

/* ===== MAIN CONTENT (otras páginas) ===== */
#main .container {
    padding-top: 2rem;
    padding-bottom: 3rem;
}

/* ===== FOOTER ===== */
#footer {
    background: #1a1a2e !important;
    border-top: none !important;
    padding: 1.2rem 2rem;
}
#footer .text-muted {
    color: rgba(255,255,255,0.35) !important;
    font-size: 0.8rem;
}
#footer a { color: #f0c87a !important; text-decoration: none; opacity: 0.8; }
#footer a:hover { opacity: 1; }
CSS;

$this->registerCss($css);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar navbar-expand-md fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Contáctenos', 'url' => ['/site/contact']],
            [
                'label' => 'Gestión Biblioteca',
                'items' => [
                    ['label' => 'Categorías',    'url' => ['/categorias/index']],
                    ['label' => 'Autores',        'url' => ['/autores/index']],
                    ['label' => 'Libros',         'url' => ['/libros/index']],
                    ['label' => 'Préstamos',      'url' => ['/prestamos/index']],
                    ['label' => 'Usuarios',       'url' => ['/user/index']],
                ],
            ],
            Yii::$app->user->isGuest ? '' : ['label' => 'Cambiar contraseña', 'url' => ['/user/change-password']],
            Yii::$app->user->isGuest
                ? ['label' => 'Iniciar sesión', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Cerrar sesión (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <?php if (Yii::$app->controller->action->id === 'index' && Yii::$app->controller->id === 'site'): ?>
        <?= $content ?>
    <?php else: ?>
        <div class="container">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    <?php endif ?>
</main>

<footer id="footer" class="mt-auto py-3">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; Mi Biblioteca <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
