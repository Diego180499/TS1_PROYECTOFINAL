<?php 
?>


<nav class="navegador nav-admin">
    <div class="enlaces-admin">
        <a href="/iniciar-sesion">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
            <path d="M9 12h12l-3 -3" />
            <path d="M18 15l3 -3" />
            </svg>
        </a>

        <a href="/notificacion_solicitudes">Solicitud Publicar Evento</a>
        <a href="/reportados">Eventos Reportados</a>
        <a href="/no_aceptados">Eventos No Aceptados</a>
        <a href="/notificacion_reportes">Notificacion de Reporte de Evento</a>
    </div>
</nav>

<div class="titulo-bienvenido titulo-admin">
    <?php echo('<h3>Módulo Administración ¡Bienvenido '.htmlspecialchars($usuario->full_name).'!</h3>') ?>
</div>