<?php
use Model\Event;
?>
<div>
    <nav class="navegador nav-pe">
    </nav>
    <div class="titulo-eventos">
        <h1>Mis Eventos</h1>
    </div>
    <div class="contenedor-eventos  cont-evp">
    <?php 
        while($event = $eventos->fetch_object()){
            $estado = "SIN APROBAR";
            $estadoClase = "estado-f";
            
            if($event->is_accept == 1){
                $estado = "ACEPTADO";
                $estadoClase = "estado-t";
            }

            echo('
            <div class="evento">
                <a href="'.htmlspecialchars($event->img_event).'" class="enlace-evento">Más Información</a>
                <h3>'.htmlspecialchars($event->event_name).'</h3>
                <p>'.htmlspecialchars($event->description).'</p>
                <p class='.htmlspecialchars($estadoClase).'>Estado: '.htmlspecialchars($estado).'</p>
            </div>
            ');
        }
    ?>
    </div>
</div>