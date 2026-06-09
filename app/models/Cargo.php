<?php
require_once __DIR__ . '/../core/Database.php';

class Cargo {

    private PDO $db;

    public function __construct(){
        $this->db = Database::getConnection();
    }

    // ================= LISTAR =================
    public function obtenerCategorias(): array {
        $sql = "SELECT * FROM Categoria ORDER BY IDcategoria";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // ================= ELIMINAR =================
    public function eliminarCategoria(string $id): array {
    $sql = "SELECT COUNT(*) AS total
            FROM Producto
            WHERE IDcategoria = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$id]);
    $fila = $stmt->fetch();

    if ($fila['total'] > 0) {
        return [
            'ok' => false,
            'mensaje' => 'Esta categoría está siendo utilizada por uno o más productos'
        ];
    }

    $sql = "DELETE FROM Categoria WHERE IDcategoria = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$id]);
    return [
        'ok' => true,
        'mensaje' => 'Categoría eliminada correctamente'
    ];
    }

    // ================= GUARDAR =================
    public function guardarCategoria(array $datos): array {

        $sql = "INSERT INTO Categoria (nombre_categoria, descripcion)
                VALUES (:n, :d)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'n' => $datos['nombre_categoria'],
            'd' => $datos['descripcion']
        ]);

        return ['ok' => true, 'mensaje' => 'Categoría registrada'];
    }

    // ================= EDITAR =================
    public function editarCategoria(array $datos): array {

        $sql = "UPDATE Categoria SET
                nombre_categoria = :n,
                descripcion = :d
                WHERE IDcategoria = :id";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'n'  => $datos['nombre_categoria'],
            'd'  => $datos['descripcion'],
            'id' => $datos['IDcategoria']
        ]);

        return ['ok' => true, 'mensaje' => 'Categoría actualizada'];
    }

    public function obtenerCargos(): array {
        $sql = "SELECT * FROM Categoria ORDER BY IDcategoria DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}