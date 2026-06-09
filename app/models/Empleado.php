<?php 
require_once __DIR__ . '/../core/Database.php';

class Empleado {

    private PDO $db;

    public function __construct(){
        $this->db = Database::getConnection();
    }

    // ================= LISTAR PRODUCTOS =================
    public function obtenerProductos(): array {
        $sql = "SELECT p.*, c.nombre_categoria
                FROM Producto p
                INNER JOIN Categoria c ON p.IDcategoria = c.IDcategoria
                ORDER BY p.IDproducto";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // ================= ELIMINAR PRODUCTO =================
    public function eliminarPorIdProducto(string $id): bool {
        $sql = "DELETE FROM Producto WHERE IDproducto = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->rowCount() > 0;
    }

    // ================= GUARDAR PRODUCTO =================
    public function guardarProducto(array $datos): array {

        $sql = "INSERT INTO Producto
                (nombre, descripcion, precio_compra, precio_venta, stock_actual, qrs, IDcategoria)
                VALUES (:n,:d,:pc,:pv,:s,:q,:c)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'n'  => $datos['nombre'],
            'd'  => $datos['descripcion'],
            'pc' => $datos['precio_compra'],
            'pv' => $datos['precio_venta'],
            's'  => $datos['stock_actual'],
            'q'  => $datos['qrs'],
            'c'  => $datos['IDcategoria']
        ]);

        return ['ok' => true, 'mensaje' => 'Producto registrado'];
    }

    // ================= EDITAR PRODUCTO =================
    public function editarProducto(array $datos): array {

        $sql = "UPDATE Producto SET
                nombre=:n,
                descripcion=:d,
                precio_compra=:pc,
                precio_venta=:pv,
                stock_actual=:s,
                qrs=:q,
                IDcategoria=:c
                WHERE IDproducto=:id";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'n'   => $datos['nombre'],
            'd'   => $datos['descripcion'],
            'pc'  => $datos['precio_compra'],
            'pv'  => $datos['precio_venta'],
            's'   => $datos['stock_actual'],
            'q'   => $datos['qrs'],
            'c'   => $datos['IDcategoria'],
            'id'  => $datos['IDproducto']
        ]);

        return ['ok' => true, 'mensaje' => 'Producto actualizado'];
    }

    // ================= BUSCAR POR QR =================
    public function buscarPorQr(string $qrs){
        $sql = "SELECT * FROM Producto WHERE qrs = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$qrs]);
        return $stmt->fetch();   
    }

    public function obtenerEmpleados(): array {
        $sql = "SELECT p.*, c.nombre_categoria
                FROM Producto p
                INNER JOIN Categoria c ON p.IDcategoria = c.IDcategoria
                ORDER BY p.IDproducto DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}