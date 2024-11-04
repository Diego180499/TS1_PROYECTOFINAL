<?php 

namespace Model;

class RequestNotification extends ActiveRecord{

    protected static $tabla = 'request_notification';
    protected static $columns = ["id","message","request_date","user_id","event_id"];

    public $id;
    public $message;
    public $requestDate;
    public $userId;
    public $eventId;

    public function __construct($id)
    {
        $this->id = $id;
    }


    public static function crearNotificacion($mensaje, $idEvento, $fecha){
        $query = "INSERT INTO request_notification (message,request_date, event_id) VALUES ('".$mensaje."','".$fecha."',".$idEvento.");";
        self::$db->query($query);
    }


    public static function obtenerSolicitudesDeEventos(){
        $query = "SELECT * FROM request_notification";
        $solicitudes = self::$db->query($query);
        return $solicitudes;
    }
}