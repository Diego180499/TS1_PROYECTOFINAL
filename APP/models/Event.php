<?php 

namespace Model;

use BadFunctionCallException;

class Event extends ActiveRecord{

    protected static $tabla = 'event';
    protected static $columns = ["id","event_name","is_accept","description","date_event","event_category_id",
    "location","event_time","public_type_id","quota"];

    public $id;
    public $eventName;
    public $esAccept;
    public $dateEvent;
    public $eventCategoryId;
    public $location;
    public $eventTime;
    public $publicTypeId;
    public $quota;

    
    //consultar eventos aceptados, es decir, eventos para publicar
    public static function eventosPublicos(){
        $query = "SELECT * FROM event WHERE is_accept = 1;";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public static function reportarEvento($eventId, $motivo){
        $query = "INSERT INTO public_report (message, event_id) VALUES ('".$motivo."',".$eventId.")";
        self::$db->query($query);
        $evento = Event::obtenerEventoPorId($eventId);
        $nombreEvento=$evento->fetch_object()->event_name;
        $fecha_actual = date('Y-m-d');
        ReportNotification::crearNotificacionReporte("Se ha reportado el evento ".$nombreEvento,$fecha_actual,$eventId);
    }


    public static function eventosReportados(){
        $query = "SELECT * FROM consulta_eventos_reportados;";
        $eventosReportados = self::$db->query($query);
        return $eventosReportados;
    }

    public static function crearEvento($eventname, $isAccept, $description, $dateEvent, $eventCategoryId, $location, $eventTime, $publicTypeId, $cupo, $organizer, $link){
        //crear evento pero aun NO está aceptado
        if(self::cantidadEventosPublicador($organizer) > 2){
            $isAccept = 1;
            self::aceptarEventosPorOrganizador($organizer);
        }else{
            $isAccept = 0;
        }
        
        $query = "INSERT INTO event (event_name, is_accept, description, date_event, event_category_id, location, event_time, public_type_id, quota, organizer, img_event )
            VALUES ('".$eventname. "','".$isAccept. "','".$description. "','".$dateEvent. "','".$eventCategoryId. "','".$location. "','".$eventTime. "','".$publicTypeId. "','".$cupo. "','".$organizer. "','".$link. "'  )";        
        self::$db->query($query);

        $eventId = self::$db->query("SELECT id FROM event WHERE event_name = '".$eventname."';");
    }

    public static function obtenerEventoPorNombre($nombre){
        $query = "SELECT * FROM event WHERE event_name = '".$nombre."';";
        $evento = self::$db->query($query);
        return $evento;
    }

    public static function obtenerEventoPorId($id){
        $query = "SELECT * FROM event WHERE id = '".$id."';";
        $evento = self::$db->query($query);
        return $evento;
    }


    public static function eventosNoAceptados(){
        $query = "select * from event WHERE is_accept = 0;";
        $eventosNoAceptados =  self::$db->query($query);
        return $eventosNoAceptados;
    }

    public static function aceptarEvento($eventId){
        $query = "UPDATE event SET is_accept = 1 WHERE id = ".$eventId.";";
        $organizer = self::obtenerIdOrganizadorEvento($eventId);
        self::cantidadEventosPublicador($organizer);
        if(self::cantidadEventosPublicador($organizer) > 2){            
            self::aceptarEventosPorOrganizador($organizer);
        }
        
        self::$db->query($query);
    }


    public static function obtenerOrganizadorEvento($eventId){
        $query = "select user_name from organizadoresEventos WHERE event_id = ".$eventId.";";
        $nombre = self::$db->query($query);
        return $nombre->fetch_object()->user_name;
    }

    public static function obtenerIdOrganizadorEvento($eventId){
        $query = "select user_id from organizadoresEventos WHERE event_id = ".$eventId.";";
        $nombre = self::$db->query($query);
        return $nombre->fetch_object()->id;
    }

    public static function eliminarEvento($eventId){
        $query = "UPDATE event SET is_accept = 0 WHERE id = ".$eventId;
        self::$db->query($query);
    }

    public static function cantidadEventosPublicador($userId){
        $query = "select cantidad_eventos from cantidad_eventos where organizer = '".$userId."' ;";
        $cantidadEventos = self::$db->query($query);
        return $cantidadEventos->fetch_object()->cantidad_eventos;
    }


    public static function aceptarEventosPorOrganizador($organizer){
        debuguear("ENTRAMOS AQUI xd");
        $query = "update event  set is_accept = 1 where organizer  = '".$organizer."'; ";
        self::$db->query($query);
    }

    public static function obtenerEventosPorOrganizador($organizer){
        $query = "select * from event e where organizer = '".$organizer."'; ";
        $eventos = self::$db->query($query);
        return $eventos;
    }

    public static function cantidadReportesEvento($eventId){
        $query = "select count(*) as reportes from public_report where event_id = '".$eventId."';";
        $reportes = self::$db->query($query);
        return $reportes->fetch_object()->reportes;
    }

    public static function reaprobarEvento($eventId){
        $query = "delete from public_report where event_id = '".$eventId."';";
        self::$db->query($query);
    }



}