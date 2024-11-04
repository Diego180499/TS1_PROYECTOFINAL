<?php
use Model\Event;

$eventos = Event::eventosPublicos();
?>
<div>
    <nav class="navegador nav-pe">
        <div class="enlace-inicio-sesion">
            <a href="/iniciar-sesion">Iniciar Sesión</a>
        </div>
    </nav>
    <div class="titulo-eventos">
        <h1>Eventos</h1>
    </div>
    <div class="contenedor-eventos  cont-evp">
    <?php 
        while($event = $eventos->fetch_object()){
            if(Event::cantidadReportesEvento($event->id) <= 2 ){
                echo('
                <div class="evento">
                    <a href="'.htmlspecialchars($event->img_event).'" class="enlace-evento">Más Información</a>
                    <h3>'.htmlspecialchars($event->event_name).'</h3>
                    <p>'.htmlspecialchars($event->description).'</p>
                    <a href="/reportar_evento?event_id='.htmlspecialchars($event->id).'" class="enlace-reportar">Reportar Evento</a>      
                </div>
                ');
            }
        }
    ?>
    </div>
</div>