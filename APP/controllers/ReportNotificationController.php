<?php

namespace Controllers;

use MVC\Router;

class ReportNotificationController{

    public static function obtenerReportesNotificaciones(Router $router){
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            $router->render("report_notification/reportes"); // REDIRIGIR A LA VISTA DE LAS NOTIFICACIONES REPORTES
        }
    }


}


?>