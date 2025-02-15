<?php 

namespace Model;

class Country extends ActiveRecord{

    protected static $tabla = 'country';
    protected static $columns = ["id","name"];

    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}