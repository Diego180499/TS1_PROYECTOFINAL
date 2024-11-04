<?php

namespace Model;

class User extends ActiveRecord{

    protected static $tabla = 'user';
    protected static $columns = ["id","full_name","username","password","email","id_country","user_type_id"];

    public $id;
    public $fullName;
    public $username;
    public $password;
    public $email;
    public $idCountry;
    public $userTypeId;


    public function __construct($username, $fullName, $password, $email, $idCountry, $userTypeId)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->fullName = $fullName;
        $this->idCountry = $idCountry;
        $this->userTypeId = $userTypeId;
    }


    //acciones db
    public function crearUsuario(){
        $initQuery = "INSERT INTO user (full_name, username,password,email, id_country, user_type_id) VALUES ('";
        $queryCreateUser = $initQuery.$this->fullName."','".$this->username."','".$this->password."','".$this->email."',".$this->idCountry.",".$this->userTypeId.");";
        $resultado = self::$db->query($queryCreateUser);
        return $resultado;
    }

    public function existeUsuario(){
        $query = "SELECT * FROM user WHERE username = '".$this->username."' AND password = '".$this->password."';";
        $resultado = self::$db->query($query);
        if($resultado->num_rows){
            return true;
        }
        return false;
    }

    public function usuarios(){
        $query = "SELECT * FROM user;";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    //obtener a un usuario
    public function obtenerUsuario($username, $password){
        $query = "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."';";
        $usuario = self::$db->query($query);
        return $usuario;
    }

    //hashear password
    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    //obtener rol de usuario
    public function obtenerRol($username, $password){
        $query = "SELECT user_type_id FROM user WHERE username = '".$this->username."' AND password = '".$this->password."';";
        $resultado = self::$db->query($query);



        return $resultado;
    }


}