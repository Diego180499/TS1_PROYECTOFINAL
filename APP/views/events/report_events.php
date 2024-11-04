<?php

use Model\Event;

$eventos = Event::eventosReportados();
?>
<div>
    <nav class="navegador-ev">
        <div class="enlace-inicio-sesion-ev">
            <a href="#">Regresar</a>
        </div>
    </nav>
    <div class="titulo-eventos-ev">
        <h1>Eventos Reportados</h1>
    </div>
    <div class="contenedor-eventos-ev">
    <?php 
        while($event = $eventos->fetch_object()){
            echo('
            <div class="evento-ev">
                <img src="/build/img/evento_'.htmlspecialchars($event->id).'.jpg" alt="Descripción de la imagen" width="400" height="300">
                <h3>'.htmlspecialchars($event->event_name).'</h3>
                <div class="detalle-reporte"><h4>Cantidad Reportes: '.htmlspecialchars($event->cantidad_reportes).'</h4></div>
                <a href="/banear_evento?event_id='.htmlspecialchars($event->id).'" class="boton-banear">Eliminar Evento</a>
                <a href="/reaprobar_evento?event_id='.htmlspecialchars($event->id).'" class="reaprobar-e">Habilitar Evento</a>
            </div>
            ');
        }
    ?>
    </div>
</div>