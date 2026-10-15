<?php
require_once "modelo/Habitacion.php";
require_once "modelo/HabitacionDao.php";

class HabitacionController
{
    private $dao;

    public function __construct($dao)
    {
        $this->dao = $dao;
    }

    public function index()
    {
        $habitaciones = $this->dao->listar();
        require "vista/habitaciones/index.php";
    }

    public function nuevo()
    {
        $habitacion = new Habitacion();
        require "vista/habitaciones/formulario.php";
    }

    public function guardar()
    {
        $habitacion = new Habitacion(
            null,
            trim($_POST["numero"] ?? ""),
            (int)($_POST["piso"] ?? 0),
            trim($_POST["tipo"] ?? ""),
            (float)($_POST["precio"] ?? 0),
            trim($_POST["foto"] ?? "")
        );

        $this->dao->insertar($habitacion);
        header("Location: index.php");
        exit;
    }

    public function editar()
    {
        $id = (int)($_GET["id"] ?? 0);
        $habitacion = $this->dao->buscarPorId($id);

        if (!$habitacion) {
            die("Habitación no encontrada.");
        }

        require "vista/habitaciones/formulario.php";
    }

    public function actualizar()
    {
        $habitacion = new Habitacion(
            (int)($_POST["id"] ?? 0),
            trim($_POST["numero"] ?? ""),
            (int)($_POST["piso"] ?? 0),
            trim($_POST["tipo"] ?? ""),
            (float)($_POST["precio"] ?? 0),
            trim($_POST["foto"] ?? "")
        );

        $this->dao->actualizar($habitacion);
        header("Location: index.php");
        exit;
    }

    public function eliminar()
    {
        $id = (int)($_GET["id"] ?? 0);
        $this->dao->eliminar($id);

        header("Location: index.php");
        exit;
    }
}
