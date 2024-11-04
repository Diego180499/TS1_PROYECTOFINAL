<?php

namespace Controllers;

use Model\Reservation;
use MVC\Router;

class ReservationController{


    public static function crearReservacion(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            Reservation::crearReservacion($_GET['user_id'],$_GET['event_id']);
            echo("<script>alert('Rservación realizada');</script>");

        }
    }

    public static function obtenerEventosPorUsuario(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $reservaciones = Reservation::obtenerReservacionesPorUsuario($_GET['user_id']);
            $router->render("reservation/reservaciones",["reservaciones"=>$reservaciones]);
        }
    }

    public static function eliminarAsistencia(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            Reservation::eliminarAsistencia($_GET['event_id'],$_GET['user_id']);
        }
    }



}


?>