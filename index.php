<?php
require_once "config/database.php";
require_once "modelo/Habitacion.php";
require_once "modelo/HabitacionDao.php";
require_once "controlador/HabitacionController.php";

$conexion = (new Database())->conectar();
$dao = new HabitacionDao($conexion);
$controller = new HabitacionController($dao);

$accion = $_GET["accion"] ?? "index";

switch ($accion) {
    case "nuevo":
        $controller->nuevo();
        break;
    case "guardar":
        $controller->guardar();
        break;
    case "editar":
        $controller->editar();
        break;
    case "actualizar":
        $controller->actualizar();
        break;
    case "eliminar":
        $controller->eliminar();
        break;
    default:
        $controller->index();
        break;
}
