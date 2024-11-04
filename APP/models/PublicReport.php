<?php 

namespace Model;

class PublicReport extends ActiveRecord{

    protected static $tabla = 'public_report';
    protected static $columns = ["id","message","event_id"];

    public $id;
    public $message;
    public $eventId;


    public static function reportarEvento($message, $evenId){
        $query = "INSERT INTO event (message, event_id) VALUES ('".$message."', '".$evenId."' );";
        self::$db->query($query);
    }

}