<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\EventController;
use Controllers\LoginController;
use Controllers\ReportNotificationController;
use Controllers\RequestNotificationController;
use Controllers\ReservationController;
use MVC\Router;

$router = new Router();

//eventos publicos
$router->get("/",[EventController::class, "eventosPublicos"]);

//crear evento
$router->get("/crear_evento",[EventController::class, "crearEvento"]);
$router->post("/crear_evento",[EventController::class, "crearEvento"]);

//eliminar evento
$router->get("/banear_evento",[EventController::class, "eliminarEvento"]);

//reportar eventos
$router->get("/reportar_evento",[EventController::class, "reportarEvento"]);
$router->post("/reportar_evento",[EventController::class, "reportarEvento"]);
$router->post("/eventos/reportados",[EventController::class, "reportarEvento"]);
$router->get("/reportados",[EventController::class, "eventosReportados"]); //vista de eventos reportados

//eventos no aceptados
$router->get("/no_aceptados",[EventController::class, "eventosNoAceptados"]); //vista de eventos reportados

//aceptar eventos /aceptar_evento
$router->get("/aceptar_evento",[EventController::class, "aceptarEvento"]); //vista de eventos reportados

//iniciar sesion
$router->get("/iniciar-sesion",[LoginController::class, "login"]);
$router->post("/iniciar-sesion",[LoginController::class, "login"]);
$router->get("/logout",[LoginController::class, "login"]);

//notificacion de solicitudes
$router->get("/notificacion_solicitudes",[RequestNotificationController::class,"solicitudesDeEventos"]);

//notificacion de reportes
$router->get("/notificacion_reportes",[ReportNotificationController::class,"obtenerReportesNotificaciones"]);



//crear cuenta
$router->get("/crearcuenta",[LoginController::class, "crearCuenta"]);
$router->post("/crearcuenta",[LoginController::class, "crearCuenta"]);

//RESERVACIONES
$router->get("/reservar",[ReservationController::class, "crearReservacion"]);
$router->get("/reservaciones",[ReservationController::class, "obtenerEventosPorUsuario"]);
$router->get("/eliminar_reservacion",[ReservationController::class, "eliminarAsistencia"]);


//eventos de organizador
$router->get("/eventos_organizador",[EventController::class, "obtenerEventosPorOrganizador"]);

//reaporbar evento
$router->get("/reaprobar_evento",[EventController::class, "reaprobarEvento"]);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();