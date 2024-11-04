<?php

use Model\Event;
?>
<div>
    <nav class="navegador">
        <div class="enlace-inicio-sesion">
            <a href="/iniciar-sesion">Salir</a>
        </div>
    </nav>
    <div class="titulo-reservs">
        <h1>Mis Reservaciones</h1>
    </div>
    <div class="contenedor-eventos">
    <?php 
        while($reservacion = $reservaciones->fetch_object()){
            $estado="";
            if($reservacion->active){
                $estado="Asistencia Activa";
            }
            echo('
            <div class="evento">
                <h1>'.htmlspecialchars($reservacion->event_name).'</h1>
                <p class="estado">Estado: '.htmlspecialchars($estado).'</p>
                <a class="enlace-ea" href="/eliminar_reservacion?event_id='.htmlspecialchars($reservacion->event_id).'&user_id='.htmlspecialchars($reservacion->user_id).'" class="enlace-deasistir">Eliminar Asistencia</a>      
            </div>
            ');
        }
    ?>
    </div>
</div>