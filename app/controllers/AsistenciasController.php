<?php
require_once __DIR__ . '/../core/Controller.php';

// Controlador del módulo de asistencias.
class AsistenciasController extends Controller {

    // Página pública: los empleados marcan asistencia sin login.
    // Ejemplo: /asistencias
    public function index(): void {
        $this->view('asistencias/index');
    }

    public function buscar(): void{
        require_once __DIR__ . '/../models/Empleado.php'; //llamamos al models
        $dni_variable = $_POST['dni']; //Almacenamos en un variable el DNI
        $empleado = new Empleado(); //Instanciamos la clase o objeto
        //Utilizamos la funcion que creamos en models/empleados
        $resultado = $empleado->buscarPorDni($dni_variable); 
        // echo "AQUI ESTA MI DNI ".$dni_variable;
        //print_r($resultado);

        // === CONVERTIRMOS AL FORMATO DE ARRAY A JSON ===
        // Le decimos al navegador que la respuesta sea JSON
        header('Content-Type: application/json');
        // Consultamos si el "$resultado" haya encontrado a un empleado
        if($resultado){
            echo json_encode(['encontrado'=>true, 'empleado' => $resultado]);
        }else{
            echo json_encode(['encontrado'=>false]);
        }
    }

    public function registradito(): void{
        require_once __DIR__ . '/../models/Asistencia.php'; //llamamos al models
        $idEmpleado_variable = $_POST['id_empleadito']; //Almacenamos en un variable el DNI
        $asistencia = new Asistencia(); //Instanciamos la clase o objeto
        $resultado = $asistencia->registrar($idEmpleado_variable); 
        header('Content-Type: application/json');
        echo json_encode(['registrado'=>true]);
    }

}
