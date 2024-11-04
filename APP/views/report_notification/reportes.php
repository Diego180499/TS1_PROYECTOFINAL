<?php
use Model\ReportNotification;

$reportes = ReportNotification::obtenerNotificacionesReportes();
?>
<div>
    <nav class="navegador-ev">
    </nav>
    <div class="titulo-eventos-ev">
        <h1>Notificacion de Eventos Reportados</h1>
    </div>
    <div class="contenedor-eventos-ev">
    <?php 
    
        while($reporte = $reportes->fetch_object()){
            echo('
            <div class="evento-ev">
                <h3>'.htmlspecialchars($reporte->message).'</h3>
                <div class="detalle-reporte"><h4>Fecha: '.htmlspecialchars($reporte->notification_date).'</h4></div>
            </div>
            ');
        }
    ?>
    </div>
</div>