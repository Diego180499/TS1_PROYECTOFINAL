<?php

namespace Controllers;

use Controllers\EventService;
use Model\Event;
use Model\EventCategory;
use Model\PublicType;
use Model\RequestNotification;
use MVC\Router;

class EventController{


    public static function crearEvento(Router $router){
        
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            $organizador = $_GET["organizer"];
            $categorias = EventCategory::obtenerCategorias();
            $tipodPublico = PublicType::obtenerTipoPublico();
            $router->render("events/crear_evento",["categorias" => $categorias, 'tipos_publico' => $tipodPublico,'organizador'=>$organizador]); // REDIRIGIR A LA VISTA DE CREAR EVENTO
        }else if($_SERVER["REQUEST_METHOD"] === "POST"){
               Event::crearEvento($_POST["nombre"],0,$_POST["descripcion"],$_POST["fecha"],$_POST["categoria"],$_POST["lugar"],"-",$_POST["tipo"],$_POST["cupo"],$_POST["organizador"],$_POST["link"]);
                $evento = Event::obtenerEventoPorNombre($_POST["nombre"]);
                $fecha_actual = date('Y-m-d');
                RequestNotification::crearNotificacion("Notificacion para publicar evento ".$_POST["nombre"] ,$evento->fetch_object()->id,$fecha_actual );
        }
    }

    public static function eventosPublicos(Router $router){
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            $router->render("events/public_events"); // REDIRIGIR A LA VISTA DE LOS EVENTOS PUBLICOS
        }
    }

    public static function reportarEvento(Router $router){
        $event_id ='0';
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            $event_id = $_GET['event_id'];
            $router->render("events/report_event");
        }else if($_SERVER["REQUEST_METHOD"] === "POST"){
            $motivo = $_POST["motivo"];
            $event_id = $_GET['event_id'];
            Event::reportarEvento($event_id,$motivo);
            $router->render("events/public_events"); //events/public_events
            echo"<script>alert('Evento reportado')</script>";
            
        }
    }


    public static function eventosReportados(Router $router){
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            //$event_id = $_GET['event_id'];
            $router->render("events/report_events");
        }
    }

    public static function eventosNoAceptados(Router $router){
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            $router->render("events/eventos_no_aceptados");
        }
    }

    public static function aceptarEvento(Router $router){
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            Event::aceptarEvento($_GET["event_id"]);
            $router->render("events/eventos_no_aceptados");
        }
    }

    public static function eliminarEvento(Router $router){
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            Event::eliminarEvento($_GET["event_id"]);
            echo("<script>alert('Se ha eliminado el evento');</script>");
        }
    }


    public static function obtenerEventosPorOrganizador(Router $router){
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            $eventos = Event::obtenerEventosPorOrganizador($_GET["organizer"]);
            $router->render("/events/eventos_organizador",["eventos"=>$eventos]);
        }
    }


    public static function reaprobarEvento(){
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            $eventos = Event::reaprobarEvento($_GET["event_id"]);
        }
    }
}