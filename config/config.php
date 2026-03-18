<?php
// Configuración de la base de datos

class baseDatos {
    public $host = "localhost";
    public $name = "veterinaria";
    public $user = "root";
    public $pass = "";

    public function obtenerConexion() {
        try {
            $conn = new PDO("mysql:host={$this->host};dbname={$this->name}", $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null ;
        }
    }
}


?>