<?php
require_once "../config/config.php";
$conexion = new baseDatos();
$db = $conexion->obtenerConexion();

$id = $_GET['id'] ?? null;
if ($id && $db) {
    $sql = $db->prepare("DELETE FROM usuarios WHERE id = ?");
    $sql->execute([$id]);
}

header("Location: /Proyecto_Sistema_de_informacion/Vista/verUsuario.php");
?>