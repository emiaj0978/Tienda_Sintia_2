<?php 
require_once __DIR__ . '/../core/Database.php';
class Cargo{
    private PDO $db;
    public function __construct(){
        $this->db = Database::getConnection();
    }
    public function obtenerCargos():array {
        $sql = "SELECT IDcategoria, nombre_categoria FROM categoria"; 
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

