<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Empleado.php';
require_once __DIR__ . '/../models/Cargo.php';

class EmpleadosController extends Controller {

    public function index(): void {
        $this->reporte();
    }

    // ================= LISTAR =================
    public function reporte(): void {

        if (!isset($_SESSION['usuario'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        $this->soloSuperAdmin();

        $producto = new Empleado();
        $categoria = new Cargo();

        $productos = $producto->obtenerProductos();
        $categorias = $categoria->obtenerCargos(); // o obtenerCategorias()

        $this->view('empleados/reportes', [
            'usuario'    => $_SESSION['usuario'],
            'productos'  => $productos,
            'categorias' => $categorias
        ]);
    }

    public function reportes(): void {
        $this->reporte();
    }

    // ================= ELIMINAR =================
    public function eliminar(): void {

        $id = $_POST['id'];

        $producto = new Empleado();
        $resultado = $producto->eliminarPorIdProducto($id);

        header('Content-Type: application/json');
        echo json_encode(['eliminar' => $resultado]);
    }

    // ================= REGISTRO =================
    public function registro(): void {

        if (!isset($_SESSION['usuario'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        $categoria = new Cargo();
        $categorias = $categoria->obtenerCargos();

        $this->view('empleados/registro', [
            'usuario' => $_SESSION['usuario'],
            'categorias' => $categorias
        ]);
    }

    // ================= EDITAR =================
    public function editar(): void {

        $producto = new Empleado();

        $resultado = $producto->editarProducto([
            'IDproducto'     => $_POST['IDproducto'],
            'nombre'         => $_POST['nombre'],
            'descripcion'    => $_POST['descripcion'],
            'precio_compra'  => $_POST['precio_compra'],
            'precio_venta'   => $_POST['precio_venta'],
            'stock_actual'   => $_POST['stock_actual'],
            'qrs'            => $_POST['qrs'],
            'IDcategoria'    => $_POST['IDcategoria']
        ]);

        header('Content-Type: application/json');
        echo json_encode(['ok' => $resultado]);
    }

    // ================= GUARDAR =================
    public function guardar(): void {

        $producto = new Empleado();

        $resultado = $producto->guardarProducto([
            'nombre'         => $_POST['nombre'],
            'descripcion'    => $_POST['descripcion'],
            'precio_compra'  => $_POST['precio_compra'],
            'precio_venta'   => $_POST['precio_venta'],
            'stock_actual'   => $_POST['stock_actual'],
            'qrs'            => $_POST['qrs'],
            'IDcategoria'    => $_POST['IDcategoria']
        ]);

        if ($resultado) {
            header('Location: ' . BASE_URL . '/empleados/reportes');
        } else {
            header('Location: ' . BASE_URL . '/empleados/registro');
        }
    }
}