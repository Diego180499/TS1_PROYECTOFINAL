<?php

namespace Controllers;

use MVC\Router;

class RequestNotificationController{

    public static function solicitudesDeEventos(Router $router){
        
        if($_SERVER["REQUEST_METHOD"] === "GET"){
           $router->render("request_notification/solicitudes");
        }
    }


}

?>