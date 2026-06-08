<?php 
require_once __DIR__ . '/../core/Database.php';
class Usuario{
    private PDO $db;
    public function __construct(){
        $this->db = Database::getConnection();
    }
    public function obtenerCargos():array {
        $sql = "SELECT id_usuario, roles, nombre_usuario, clave FROM usuario"; 
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
