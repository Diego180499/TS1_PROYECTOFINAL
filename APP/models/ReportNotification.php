<?php 

namespace Model;

class ReportNotification extends ActiveRecord{

    protected static $tabla = 'report_notification';
    protected static $columns = ["id","message","notification_date","user_id","publication_report_id"];

    public $id;
    public $message;
    public $notification_date;
    public $userId;
    public $eventId;
    

    public function __construct($id)
    {
        $this->id = $id;
    }


    public static function crearNotificacionReporte($mensaje, $fecha, $eventoId){
        $query = "INSERT INTO report_notification (message, notification_date, event_id) VALUES ('".$mensaje."','".$fecha."',".$eventoId." );";
        self::$db->query($query);
    }


    public static function obtenerNotificacionesReportes(){
        $query = "SELECT * FROM report_notification;";
        $notificaciones = self::$db->query($query);
        return $notificaciones;
    }

}