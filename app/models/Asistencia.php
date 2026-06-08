<?php
require_once __DIR__ . '/../core/Database.php';
date_default_timezone_set('America/Los_Angeles');

class Asistencia{
    private PDO $db;
    public function __construct()
    {
        $this->db = Database::getConnection();
    }
    //Creamos una funcion para registrar junto con su parametro de (int $id_empleado)
    public function registrar(int $IDproducto): void{

        // Registrar la salida del producto
        $sql = "INSERT INTO Salida(fecha, cantidad, IDproducto)
                VALUES(CURDATE(), 1, ?)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$IDproducto]);

        // Descontar 1 unidad del stock
        $sql2 = "UPDATE Producto
                 SET stock_actual = stock_actual - 1
                 WHERE IDproducto = ?
                 AND stock_actual > 0";

        $stmt2 = $this->db->prepare($sql2);
        $stmt2->execute([$IDproducto]);
    }

}
