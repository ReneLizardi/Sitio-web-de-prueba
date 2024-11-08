<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: usuario.html#INGRESAR');
    exit();
}

$user_id = $_SESSION['user_id'];
$servicio_id = $_POST['servicio_id'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

$sql = "INSERT INTO citas (usuario_id, servicio_id, fecha, hora) VALUES ('$user_id', '$servicio_id', '$fecha', '$hora')";

if ($conn->query($sql) === TRUE) {
    echo "Nueva cita creada exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: usuarios.php#CITAS');
?>
