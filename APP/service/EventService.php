<?php

namespace Controllers;

use Model\ActiveRecord;
use Model\Event;

class EventService extends ActiveRecord{

    public static function obtenerEventosAceptados(){
        $eventos = Event::eventosPublicos();
        return $eventos;
    }
}
