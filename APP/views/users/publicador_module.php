<?php

?>

<nav class="navegador">
    <div class="enlaces-publicador">
        <a href="/iniciar-sesion">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
            <path d="M9 12h12l-3 -3" />
            <path d="M18 15l3 -3" />
            </svg>
        </a>

        <?php echo('<a href="/crear_evento?organizer='.htmlspecialchars($usuario->id).'">Crear Evento</a>');?>
        <?php echo('<a href="/eventos_organizador?organizer='.htmlspecialchars($usuario->id).'">Ver Eventos</a>');?>
        
    </div>
</nav>
<div class="titulo-bienvenido">
    <?php echo('<h3>Módulo Publicador ¡Bienvenido '.htmlspecialchars($usuario->full_name).'!</h3>') ?>
</div>