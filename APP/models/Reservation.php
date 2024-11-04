<?php 

namespace Model;

class Reservation extends ActiveRecord{

    protected static $tabla = 'reservation';
    protected static $columns = ["id","active","user_id","event_id"];

    public $id;
    public $active;
    public $userId;
    public $eventId;

    public function __construct($id)
    {
        $this->id = $id;
    }


    public static function crearReservacion($userId, $eventId){
        $query = "INSERT INTO reservation (active, user_id, event_id) VALUES (1,'".$userId."','".$eventId."') ;";
        self::$db->query($query);
    }

    public static function obtenerReservacionesPorUsuario($userId){
        $query = "select * from reservaciones_eventos WHERE user_id = '".$userId."' AND active = 1; ";
        $reservaciones = self::$db->query($query);
        return $reservaciones;
    }

    public static function eliminarAsistencia($eventId, $userId){
        $query = "update reservation  set active = 0 where user_id = '".$userId."' and event_id = '".$eventId."' ;";
        self::$db->query($query);
        echo("<script>alert('Se ha eliminado su reservación');</script>");
    }



}