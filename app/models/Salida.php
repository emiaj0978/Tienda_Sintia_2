<?php 
require_once __DIR__ . '/../core/Database.php';
class Salida{
    private PDO $db;
    public function __construct(){
        $this->db = Database::getConnection();
    }
    public function obtenerCargos():array {
        $sql = "SELECT * FROM salida
                INNER JOIN producto 
                ON salida.IDproducto = producto.IDproducto 
                ORDER BY salida.IDsalida ASC"; 
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function obtenerPorFecha($fecha): array {

    $sql = "SELECT *
            FROM salida
            INNER JOIN producto
            ON salida.IDproducto = producto.IDproducto
            WHERE salida.fecha = ?
            ORDER BY salida.IDsalida ASC";

    $stmt = $this->db->prepare($sql);
    $stmt->execute([$fecha]);

    return $stmt->fetchAll();
}


}




