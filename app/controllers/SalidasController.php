<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Salida.php';

// Controlador para el módulo de empleados.
class SalidasController extends Controller {

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
        require_once __DIR__ . '/../models/Empleado.php';
        $modelo = new Empleado();
        $variable_empleados = $modelo->obtenerEmpleados();

        
        $cargo = new salida();
        $variable_cargo = $cargo->obtenerCargos();

        $cargo = new Salida();
        $fecha = $_GET['fecha'] ?? date('Y-m-d');
        $variable_cargo = $cargo->obtenerPorFecha($fecha);

        // Enviamos los datos a la vista.
        $this->view('salidas/reportes', [
            'usuario'     => $_SESSION['usuario'],
            'empleados'   => $variable_empleados,
            'lista_cargo' => $variable_cargo,
            'fecha'       => $fecha
        ]);
    }

    public function reportes(): void {
        $this->reporte();
    }

    
    
}
