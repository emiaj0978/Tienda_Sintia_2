<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Usuario.php';

// Controlador para el módulo de empleados.
class UsuariosController extends Controller {

    public function index(): void {
        $this->reporte();
    }

    public function reporte(): void {
        if (!isset($_SESSION['usuario'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }
        $this->soloSuperAdmin();

        // Cargamos el modelo y obtenemos los datos de empleados.
        //$modelo = new Empleado();
        //$variable_empleados = $modelo->obtenerEmpleados();

        //require_once __DIR__ . '/../models/Cargo.php';
        $cargo = new Usuario();
        $variable_cargo = $cargo->obtenerCargos();

        // Enviamos los datos a la vista.
        $this->view('usuarios/reportes', [
            'usuario'     => $_SESSION['usuario'],
            //'empleados'   => $variable_empleados,
            'lista_cargo' => $variable_cargo
        ]);
    }

    public function reportes(): void {
        $this->reporte();
    }

    
}
