<?php

/** @var yii\web\View $this */

$this->title = 'Mi Biblioteca';
?>
<div class="site-index">

    <!-- HERO -->
    <div class="biblioteca-hero">
        <div class="hero-inner">
            <div class="hero-badge">
                <i class="ti ti-book"></i> Sistema de Gestión
            </div>
            <h1>Tu biblioteca,<br><span class="hero-accent">organizada y accesible</span></h1>
            <p class="hero-lead">Gestiona libros, autores, préstamos y usuarios desde un solo lugar. Rápido, simple y confiable.</p>
            <div class="hero-actions">
                <a class="btn-primary-lib" href="/libros/index">
                    <i class="ti ti-arrow-right"></i> Explorar catálogo
                </a>
                <a class="btn-outline-lib" href="">
                    Ver documentación
                </a>
            </div>
        </div>
    </div>

    <!-- ESTADÍSTICAS -->
    <div class="biblioteca-stats">
        <div class="stat-item">
            <div class="stat-num">2,400+</div>
            <div class="stat-label">Libros registrados</div>
        </div>
        <div class="stat-item">
            <div class="stat-num">340</div>
            <div class="stat-label">Autores</div>
        </div>
        <div class="stat-item">
            <div class="stat-num">180</div>
            <div class="stat-label">Préstamos activos</div>
        </div>
    </div>

    <!-- CARDS DE MÓDULOS -->
    <div class="biblioteca-features">
        <div class="feat-grid">

            <div class="feat-card">
                <div class="feat-icon">
                    <i class="ti ti-books"></i>
                </div>
                <h3>Catálogo de libros</h3>
                <p>Consulta, registra y organiza el inventario completo de la biblioteca por categorías y autores.</p>
                <a class="feat-link" href="/libros/index">Ver catálogo &rarr;</a>
            </div>

            <div class="feat-card">
                <div class="feat-icon">
                    <i class="ti ti-users"></i>
                </div>
                <h3>Gestión de usuarios</h3>
                <p>Administra cuentas, roles y permisos para estudiantes, bibliotecarios y administradores.</p>
                <a class="feat-link" href="/user/index">Ver usuarios &rarr;</a>
            </div>

            <div class="feat-card">
                <div class="feat-icon">
                    <i class="ti ti-arrows-exchange"></i>
                </div>
                <h3>Control de préstamos</h3>
                <p>Registra devoluciones y préstamos activos con seguimiento completo y alertas de vencimiento.</p>
                <a class="feat-link" href="/prestamos/index">Ver préstamos &rarr;</a>
            </div>

        </div>
    </div>

</div>
