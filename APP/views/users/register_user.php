<?php

use Model\Event;

$eventos = Event::eventosPublicos();

?>
<div>
    <nav class="navegador-ur">
        <div class="enlace-ur">
            <a href="/iniciar-sesion">Salir</a>
        </div>
        <div class="enlace-ur">
            <?php 
            echo('<a href="/reservaciones?user_id='.htmlspecialchars($usuario->id).'">Mis Reservaciones</a>');
            ?>
        </div>

    </nav>
    <div class="titulo-eventos">
        <h1>Eventos</h1>
    </div>
    <div class="contenedor-eventos">
    <?php 
        while($event = $eventos->fetch_object()){
            echo('
            <div class="evento">
                <a href="'.htmlspecialchars($event->img_event).'" class="enlace-evento">Más Información</a>
                <h3>'.htmlspecialchars($event->event_name).'</h3>
                <p>'.htmlspecialchars($event->description).'</p>
                <div class="opciones-ur">
                    <div class="contenedor-enlace-r">
                        <a href="/reportar_evento?event_id='.htmlspecialchars($event->id).'" class="enlace-reportar-ur">Reportar Evento</a>
                    </div>
                    <div class="contenedor-da">
                        <a href="/reservar?user_id='.htmlspecialchars($usuario->id).'&event_id='.htmlspecialchars($event->id).'" class="boton-reservar">Deseo Asistir</a>
                    </div>
                </div>
                      
            </div>
            ');
        }
    ?>
    </div>
</div>