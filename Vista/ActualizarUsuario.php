<?php 
require_once "../config/config.php";
$con = new baseDatos();
$db = $con->obtenerConexion();

$id = $_GET['id'] ?? null;
$usuario = null;

if ($id && $db) {
    $sql = $db->prepare("SELECT * FROM usuarios WHERE id = ?");
    $sql->execute([$id]);
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_post = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    if ($db) {

        $sql = $db->prepare("UPDATE usuarios SET username = ?, email = ?, password = ?, rol = ? WHERE id = ?");
        $sql->execute([$username, $email, $password, $rol, $id_post]);
        
       
        header("Location: VerUsuario.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Editar Usuario: <?= $usuario['username'] ?? 'No encontrado' ?></h4>
                </div>
                <div class="card-body">
                    <?php if ($usuario): ?>
                        <form action="ActualizarUsuario.php" method="POST">
                            <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

                            <div class="mb-3">
                                <label class="form-label">Nombre de Usuario</label>
                                <input type="text" name="username" class="form-control" value="<?= $usuario['username'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Correo Electrónico</label>
                                <input type="email" name="email" class="form-control" value="<?= $usuario['email'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Contraseña</label>
                                <input type="text" name="password" class="form-control" value="<?= $usuario['password'] ?>" required>
                            </div>

                            <div class="mb-3">
                            <label class="form-label fw-bold">Asignar Nuevo Rol</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                                <select name="rol" class="form-select">
                                    <option value="ADMIN" <?= ($usuario['rol'] == 'ADMIN') ? 'selected' : '' ?>>
                                        Administrador (Acceso Total)
                                    </option>
                                    <option value="VETERINARIO" <?= ($usuario['rol'] == 'VETERINARIO') ? 'selected' : '' ?>>
                                        Veterinario (Gestión Médica)
                                    </option>
                                    <option value="USUARIO" <?= ($usuario['rol'] == 'USUARIO') ? 'selected' : '' ?>>
                                        Usuario (Solo Lectura)
                                    </option>
                                </select>
                            </div>
                            <small class="text-muted">Selecciona el nivel de acceso para este usuario.</small>
                        </div>

                            <div class="d-flex justify-content-between">
                                <a href="VerUsuario.php" class="btn btn-secondary">Volver</a>
                                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                            </div>
                        </form>
                    <?php else: ?>
                        <div class="alert alert-danger">Usuario no encontrado.</div>
                        <a href="VerUsuario.php" class="btn btn-secondary">Volver</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>