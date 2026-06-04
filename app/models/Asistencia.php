<?php
require_once __DIR__ . '/../core/Database.php';
date_default_timezone_set('America/Los_Angeles');

class Asistencia
{
    private PDO $db;
    public function __construct()
    {
        $this->db = Database::getConnection();
    }
    //Creamos una funcion para registrar junto con su parametro de (int $id_empleado)
    public function registrar(int $id_empleado): void{
        // variable $sql para registrar datos  
        $sql = "INSERT INTO asistencia(fecha,hora_entrada,hora_salida,estado,id_empleado)
        VALUES(CURDATE(), NOW(), null, 'asistio', ?)"; 
        // statement = declaración
        $stmt = $this->db->prepare($sql);
        // Ejecutamos la declaración ($stmt) - statement(sentencia, declaración) 
        $stmt->execute([$id_empleado]);
    }

}
