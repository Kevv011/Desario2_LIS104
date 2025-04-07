<?php
require_once "config/Database.php";

class AuthModel
{
    //Variable para almacenar la conexión PDO en cada metodo
    private $db;

    //Constructor que guarda una instancia de la clase Database y obtener la conexión
    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Metodo para agregar un usuario
    public function guardarUsuario($nombre, $correo, $telefono, $direccion, $cod_postal)
    {
        $sql = "INSERT INTO usuarios (nombre, correo, telefono, direccion, cod_postal) 
                VALUES (:nombre, :correo, :telefono, :direccion, :cod_postal)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':cod_postal', $cod_postal);

        return $stmt->execute();
    }
}
