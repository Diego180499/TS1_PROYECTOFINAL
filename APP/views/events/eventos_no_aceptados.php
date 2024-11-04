<?php

use Model\Event;

$eventos = Event::eventosNoAceptados();
?>
<div>
    <nav class="navegador">
        <div class="enlace-inicio-sesion">
            
        </div>
    </nav>
    <div class="titulo-eventos">
        <h1>Eventos</h1>
    </div>
    <div class="contenedor-eventos">
    <?php 
        while($event = $eventos->fetch_object()){
            Event::obtenerOrganizadorEvento($event->id);
            echo('
            <div class="evento">
                <h3>'.htmlspecialchars($event->event_name).'</h3>
                <p>'.htmlspecialchars($event->description).'</p>
                <p class="p-organizador">Organizado por: '.htmlspecialchars(Event::obtenerOrganizadorEvento($event->id)).'</p>
                <a href="/aceptar_evento?event_id='.htmlspecialchars($event->id).'" class="boton-aceptar">Aceptar</a>
            </div>
            ');
        }
    ?>
    </div>
</div>
