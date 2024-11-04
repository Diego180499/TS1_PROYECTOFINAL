<?php 

namespace Model;

class PublicType extends ActiveRecord{

    protected static $tabla = 'public_type';
    protected static $columns = ["id","type_name"];

    public $id;
    public $typeName;

    public function __construct($id, $typeName)
    {
        $this->id = $id;
        $this->typeName = $typeName;
    }


    public static function obtenerTipoPublico(){
        $query = "SELECT * FROM public_type;";
        $resultado = self::$db->query($query);
        return $resultado;
    }
}