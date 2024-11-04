<?php

namespace Controllers;

use Model\User;
use MVC\Router;

class LoginController{

    public static function login(Router $router){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $datos = $_POST;
            
            $usuario = new User($datos['username'],"",$datos['password'],"","",0);
            $existeUsuario = $usuario->existeUsuario();
            
            if($existeUsuario){
                // VALIDAR QUE TIPO DE USUARIO ES, Y EN BASE A ESO REDIRIGIR A LA PANTALLA
                $rol = $usuario->obtenerRol($usuario->username,$usuario->password);
                $rolValue = $rol->fetch_object();
                if($rolValue->user_type_id === "1"){
                    $usuarioEncontrado = $usuario->obtenerUsuario($usuario->username,$usuario->password);
                    $router->render("users/admin_module",['usuario'=>$usuarioEncontrado->fetch_object()]);
                }else if($rolValue->user_type_id === "2"){
                    $usuarioEncontrado = $usuario->obtenerUsuario($usuario->username,$usuario->password);
                    $router->render('users/publicador_module',['usuario'=>$usuarioEncontrado->fetch_object()]);
                }else if($rolValue->user_type_id === "3"){
                    $usuarioEncontrado = $usuario->obtenerUsuario($usuario->username,$usuario->password);
                    $router->render('users/register_user',['usuario'=>$usuarioEncontrado->fetch_object()]);
                }
            }else{
                echo "<script>alert('el usuario no existe, regístrate')</script>";
                $router->render('auth/login');
            }
        }else{
            $router->render('auth/login');
        }
    }

    public static function iniciarSesion(Router $router){
        echo"INICIANDO SESION...";
    }

    public static function crearCuenta(Router $router){

        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $datos = $_POST;

            $usuario = new User($datos["usuario"],$datos["password"],$datos["email"],$datos["phone"],$datos["country"],$datos["tipo"]);
        
            if($usuario->existeUsuario()){
                echo "<script>alert('este usuario ya existe')</script>";
            }else{
                $resultado = $usuario->crearUsuario();
                echo "<script>alert('El usuario ".$usuario->username.", fué creado correctamente')</script>";
            }
            
        }
        //TODO hace falta hashear el password
        $router->render('auth/crear_cuenta',['usuario'=> $usuario, 'alertas'=>$alertas]);
    }



}