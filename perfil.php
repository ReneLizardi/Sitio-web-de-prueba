<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: usuario.html#INGRESAR');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Perfil de Usuario</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['nombre']; ?></h1>
    <p>Esta es una página protegida solo para usuarios registrados.</p>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
