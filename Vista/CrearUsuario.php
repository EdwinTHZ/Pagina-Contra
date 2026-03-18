<?php
require_once "../config/config.php";
$conexion = new baseDatos();
$db = $conexion->obtenerConexion();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["username"] ?? '';
        $email = $_POST["email"] ?? '';
        $password = $_POST["password"]  ?? '';

        if ($nombre && $email && $password) {
          $sql = $db->prepare("INSERT INTO usuarios (username, email, password) VALUES (?, ?, ?)");  
          $sql->execute([$nombre, $email, $password]);

          header("Location: /Proyecto_Sistema_de_informacion/Vista/Inicio_sesion.html");
          exit();
        } else {
            echo "Faltan datos. Por favor, completa todos los campos";
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - CatByte</title>
  <link rel="stylesheet" href="../RECURSOS/CSS/reg.css">
</head>
<body>
  <div class="registro-contenedor">
    <h2>Registro de Usuario - CatByte 🐾</h2>
    <form method="post">
      <label for="nombre">Nombre de usuario</label>
      <input type="text" id="nombre" name="username" required>

      <label for="correo">Correo electrónico</label>
      <input type="email" id="correo" name="email" required>

      <label for="contrasena">Contraseña</label>
      <input type="password" id="contrasena" name="password" required>

      <button type="submit">Registrarse</button>
    </form>
    <p>¿Ya tienes cuenta? <a href="/Proyecto_Sistema_de_informacion/Vista/Inicio_sesion.html">Inicia sesión</a></p>
  </div>

  <script src="/Proyecto_Sistema_de_informacion/RECURSOS/JavaScript/reg.js"></script>
</body>
</html>