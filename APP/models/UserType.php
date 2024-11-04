<?php 

namespace Model;

class UserType extends ActiveRecord{

    protected static $tabla = 'user_type';
    protected static $columns = ["id","type"];

    public $id;
    public $type;

    public function __construct($id, $type)
    {
        $this->id = $id;
        $this->type = $type;
    }
}