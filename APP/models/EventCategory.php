<?php 

namespace Model;

class EventCategory extends ActiveRecord{

    protected static $tabla = 'event_category';
    protected static $columns = ["id","category_name"];

    public $id;
    public $categoryName;

    public function __construct($id, $categoryName)
    {
        $this->id = $id;
        $this->categoryName = $categoryName;
    }


    public static function obtenerCategorias(){
        $query = "SELECT * FROM  event_category;";
        $categorias = self::$db->query($query);
        return $categorias;
    }
}