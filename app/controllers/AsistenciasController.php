<?php
require_once __DIR__ . '/../core/Controller.php';
class AsistenciasController extends Controller {

    public function index(): void {
        $this->view('asistencias/index');
    }
    public function buscar(): void{
        require_once __DIR__ . '/../models/Empleado.php';
        $qrs = $_POST['qrs'];
        $producto = new Empleado();
        $resultado = $producto->buscarPorQr($qrs);
        header('Content-Type: application/json');
        if($resultado){
            echo json_encode([
                'encontrado' => true,
                'producto' => $resultado
            ]);
        }else{
            echo json_encode([
                'encontrado' => false
            ]);
        }
    }

    public function registradito(): void{
        require_once __DIR__ . '/../models/Asistencia.php';
        $idProducto = $_POST['id_producto'];
        $asistencia = new Asistencia();
        $asistencia->registrar($idProducto);
        header('Content-Type: application/json');
        echo json_encode([
            'registrado' => true
        ]);
    }
    
}