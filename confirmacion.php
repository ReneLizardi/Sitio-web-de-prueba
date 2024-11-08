<?php
session_start();
$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "Operación realizada.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Confirmación</title>
</head>
<body>
    <div class="container">
        <h2><?php echo $mensaje; ?></h2>
        <p>Puedes cerrar esta página y continuar en la anterior.</p>
        <a href="usuario.php" class="btn btn-primary">Volver a Usuario</a>
    </div>
</body>
</html>
