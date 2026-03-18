<?php
Require_once "../config/config.php";
$conexion = new baseDatos();
$db = $conexion->obtenerConexion();  

if ($_POST) {
    $user_input = $_POST['username'];
    $pass_input = $_POST['password'];

    if ($db) {
        $sql = $db->prepare("SELECT * FROM usuarios WHERE username = ?");
        $sql->execute([$user_input]);
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);

     
        if ($usuario) {
            
        
            if ($pass_input === $usuario['password']) {
                
            
                $_SESSION['id_usuario'] = $usuario['id'];
                $_SESSION['nombre'] = $usuario['username'];
                $_SESSION['rol'] = $usuario['rol']; 

                header("Location: VerUsuario.php"); 
                exit();
            } else {

            }
        } else {

        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inicio de Sesión</title>
  <link rel="stylesheet" href="../RECURSOS/CSS/SStyle.css" />
</head>
<body>
  <div class="login-container">
    <h2>Iniciar Sesión</h2>
    <form id="loginForm" method="POST">
      <input type="username" id="username" name="username" placeholder="Nombre de usuario" required />
      <input type="password" id="password" name="password" placeholder="Contraseña" required />
      <button type="submit">Entrar</button>
    </form>
    <p>¿No tienes una cuenta? <a href="CrearUsuario.php">Regístrate</a></p>
  </div>


</body>
</html>
