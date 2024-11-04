<?php

use Model\RequestNotification;

$solicitudes = RequestNotification::obtenerSolicitudesDeEventos();
?>
<nav class="navegador">
    
</nav>
<div class="contenedor-solicitudes">
    <div class="titulo-solicitudes">
        <h1>Notificaciones de Solicitudes de Eventos</h1>
    </div>

    <div class="contenedor-eventos">
    <?php 
        while($solicitud = $solicitudes->fetch_object()){
            echo('
            <div class="evento">
                <h3>'.htmlspecialchars($solicitud->message).'</h3>
                <p>'.htmlspecialchars($solicitud->request_date).'</p>
            </div>
            ');
        }
    ?>
    </div>
</div>